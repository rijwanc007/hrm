<?php

namespace App\Http\Controllers\Admin;

use App\BalanceHistory;
use App\Bank;
use App\CompanyAccount;
use App\Http\Controllers\Controller;
use App\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use NumberToWords\NumberToWords;

class BankController extends Controller
{
    public function index()
    {
//        if (Auth::user()->can('bank_index')) {
        $banks = Bank::orderBy('id', 'DESC')->paginate(20);
        return view('banks.index', compact('banks'));
//        }else{
//            abort(404,'Page not found.');
//        }
    }
    public function create()
    {
//        if (Auth::user()->can('bank_create')) {
        return view('banks.create');
//        }else{
//            abort(404,'Page not found.');
//        }
    }
    public function store(Request $request)
    {
        Bank::create([
           'bank_name'=>$request->bank_name,
           'branch'=>$request->branch,
           'account'=>$request->account,
           'balance'=>0,
        ]);
        Session::flash('success', 'Bank account created successfully');
        return redirect()->route('bank.index');
    }
    public function show($id)
    {
        $debits  = BalanceHistory::where('bank_id','=',$id)->where('type','=','debit')->get();
        $credits  = BalanceHistory::where('bank_id','=',$id)->where('type','=','credit')->get();
        return view('banks.show',compact('debits','credits','id'));
    }
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('banks.edit', compact('bank'));
    }
    public function update(Request $request, $id)
    {
        $bank = Bank::find($id);
        $bank->update([
            'bank_name'=>$request->bank_name,
            'branch'=>$request->branch,
            'account'=>$request->account,
            'balance'=>$request->balance,
        ]);
        Session::flash('success', 'Bank account created successfully');
        return redirect()->route('bank.index');
    }

    public function destroy($id)
    {
        $bank = Bank::find($id);
        $old_company_account = CompanyAccount::orderBy('id', 'DESC')->first();
        if(empty($old_company_account)){
            $bank->delete();
            Session::flash('success', 'Bank account Deleted successfully');
            return redirect()->back();
        }
        $taxes = Tax::orderBy('id', 'DESC')->get();
        if($old_company_account->balance >= $bank->balance){
            $old_company_account->update([
                'balance'=> $old_company_account->balance - $bank->balance
            ]);
            if(!empty($taxes)){
                foreach($taxes as $tax){
                    if($old_company_account->balance >= $tax->range_from && $old_company_account->balance <= $tax->range_to){
                        $old_company_account->update(['tax'=> ($tax->tax/100) * $tax->balance,]);
                    }
                    else{
                        $old_company_account->update(['tax'=> 0]);
                    }
                }
            }
            else{
                $old_company_account->update(['tax'=> 0]);
            }
        }
        else{
            Session::flash('error', 'Bank account can not be Deleted');
            return redirect()->back();
        }
        $bank->delete();
        Session::flash('success', 'Bank account Deleted successfully');
        return redirect()->back();
    }
    public function withdraw(){
        $banks = Bank::orderBy('id', 'DESC')->get();
        return view('banks.withdraw', compact('banks'));
    }
    public function withdraw_store(Request $request){
        dd($request->all());
    }
    public function bankBalanceSearch(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $id = $request->id;
        $debits  = BalanceHistory::where('bank_id','=',$id)->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->where('type','=','debit')->get();
        $credits  = BalanceHistory::where('bank_id','=',$id)->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->where('type','=','credit')->get();
        return view('banks.show',compact('debits','credits','id','from','to'));
    }
    public function bank_cheque_input(Request $request){
        $payto = $request->pay_to;
        $amount = $request->amount_input;
        $date = date('d-m-Y', strtotime($request->date_input));
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');
        $sum = $numberTransformer->toWords($amount);
        return view('banks.chequebook.index', compact('payto', 'amount', 'date', 'sum'));
    }
    public function bank_cheque(){
        return view('banks.chequebook.create');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pdfbank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Smalot\PdfParser\Parser;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdfbank::orderBy('id', 'DESC')->first();
        $parser = new Parser();
//        $pdf    = $parser->parseFile('file:///C:/xampp/htdocs/hrm/public/assets/images/employees/cv/141718761.pdf');
        $public_path = 'file:///C:/xampp/htdocs/hrm/public/assets/images/employees/cv/';
        $pdf    = $parser->parseFile($public_path. $pdfs->file_name);
        $text = $pdf->getText();
        preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $text, $emails);
        preg_match_all("/[\.0-9]+/i",$text,$phones);
        preg_match_all("/[\._A-Z][a-z]+(?: [A-Z]\.)? [A-Z][a-z]+/i",$text,$names);
        preg_match_all("/([A-Z][a-z][^\s]+?\s[(]?)*(College|University|Institute|Law School|School of|Academy)[^,\d]*(?=,|\d)/",$text, $educations);
        print_r($educations);
//        return view('pdf.index', compact('pdfs', 'emails', 'phones', 'names'));
    }
    public function create()
    {
        return view('pdf.create');
    }
    public function store(Request $request)
    {
        $cv = $request->file('cv');
        $cv_name = rand().'.'.$cv->getClientOriginalExtension();
        $cv->move(public_path().'/assets/images/employees/cv/',$cv_name);
//        $text = (new Pdf())
//            ->setPdf('C:/xampp/htdocs/hrm/public/assets/images/employees/cv/' . $cv_name)
//            ->text();
//        dd($text);
        Pdfbank::create(['file_name'=>$cv_name]);
        Session::flash('success', 'Employee profile Created succesfully');
        return redirect()->route('pdf.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $pdf = Pdf::find($id);
        unlink('assets/images/employees/cv/'.$pdf->file_name);
        $pdf->delete();
        Session::flash('success', 'Employee cv bank Deleted succesfully');
        return redirect()->route('pdf.index');
    }
}

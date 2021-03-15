<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => ['preventbackbutton','auth']],function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('user', 'Admin\UserController');
    Route::get('user-create', 'Admin\UserController@create')->name('user.create');
    Route::get('user-index', 'Admin\UserController@index')->name('user.index');
    Route::get('user-resigned', 'Admin\UserController@resigned')->name('user.resigned');
    Route::get('user-terminated', 'Admin\UserController@terminated')->name('user.terminated');
    Route::get('user-group-create', 'Admin\UserController@group_create')->name('user.group_create');
    Route::get('user-group-info', 'Admin\UserController@group_info')->name('user.group_info');

//    Route::get('task-create', 'Admin\UserController@task_create')->name('task.task_create');
//    Route::get('task-info', 'Admin\UserController@task_info')->name('task.task_info');

//    Route::get('loan-create', 'Admin\UserController@loan_create')->name('loan.loan_create');
//    Route::get('loan-index', 'Admin\UserController@loan_index')->name('loan.loan_index');
//    Route::get('loan-period-create', 'Admin\UserController@loan_period_create')->name('loan.loan_period_create');
//    Route::get('loan-period-index', 'Admin\UserController@loan_period_index')->name('loan.loan_period_index');

    Route::get('job-create', 'Admin\UserController@job_create')->name('job.job_create');
    Route::get('job-info', 'Admin\UserController@job_info')->name('job.job_info');

    Route::get('Message-info', 'Admin\UserController@message_info')->name('message.index');

    Route::get('overtime-create', 'Admin\UserController@overtime_create')->name('overtime.create');
    Route::get('overtime-info', 'Admin\UserController@overtime_info')->name('overtime.index');

    Route::get('provident-info', 'Admin\UserController@provident_info')->name('provident.index');

    Route::get('announcement-create', 'Admin\UserController@announcement_create')->name('announcement.create');
    Route::get('announcement-info', 'Admin\UserController@announcement_info')->name('announcement.index');

    Route::get('role-create', 'Admin\UserController@role_create')->name('role.create');
    Route::get('role-info', 'Admin\UserController@role_info')->name('role.index');


});

Route::resource('pdf', 'Admin\PdfController');
Route::get('pdf-create', 'Admin\PdfController@create')->name('pdf.create');
Route::get('pdf-index', 'Admin\PdfController@index')->name('pdf.index');

Route::resource('department', 'Admin\DepartmentController');
Route::get('department-create', 'Admin\DepartmentController@create')->name('department.create');
Route::get('department-index', 'Admin\DepartmentController@index')->name('department.index');

Route::resource('bank', 'Admin\BankController');
Route::get('bank-create', 'Admin\BankController@create')->name('bank.create');
Route::get('bank-index', 'Admin\BankController@index')->name('bank.index');

Route::resource('employee', 'Admin\EmployeeController');
Route::get('employee-create', 'Admin\EmployeeController@create')->name('employees.create');
Route::get('employee-index', 'Admin\EmployeeController@index')->name('employees.index');
Route::get('employee-show-{id}', 'Admin\EmployeeController@show')->name('employee.show');
Route::get('employee-extra-activity-{id}', 'Admin\EmployeeController@extra_activity')->name('employees.extra_activity');

Route::resource('attendance', 'Admin\AttendanceController');
Route::get('attendance-create', 'Admin\AttendanceController@create')->name('attendance.attendance_create');
Route::get('attendance-index', 'Admin\AttendanceController@index')->name('attendance.attendance_info');
Route::get('attendance-employee-search', 'Admin\AttendanceController@employee_search')->name('attendance.employee_search');
Route::get('/department_id/{department_id}', 'Admin\AttendanceController@employee');
Route::post('/attendance/month/','Admin\AttendanceController@attendance_Month')->name('attendance_month');

Route::resource('leave', 'Admin\LeaveController');
Route::get('leave-create', 'Admin\LeaveController@create')->name('leave.create');
Route::get('leave-info', 'Admin\LeaveController@index')->name('leave.index');
Route::get('leave-approve-{id}', 'Admin\LeaveController@approve')->name('leave.approve');
Route::get('leave-cancel-{id}', 'Admin\LeaveController@cancel')->name('leave.cancel');

Route::resource('asset', 'Admin\AssetController');
Route::get('asset-create', 'Admin\AssetController@create')->name('asset.create');
Route::get('asset-index', 'Admin\AssetController@index')->name('asset.index');
Route::get('asset-requisition-create', 'Admin\AssetController@create_requisition')->name('asset.create_requisition');
Route::post('asset-store-requisition', 'Admin\AssetController@store_requisition')->name('asset.store_requisition');
Route::get('asset-requisition-index', 'Admin\AssetController@index_requisition')->name('asset.index_requisition');
Route::get('asset-pending-{id}', 'Admin\AssetController@pending')->name('asset.pending');

Route::resource('resign', 'Admin\ResignController');
Route::get('resign-create', 'Admin\ResignController@create')->name('resign.create');
Route::get('resign-info', 'Admin\ResignController@index')->name('resign.index');
Route::get('resign-ratio', 'Admin\ResignController@ratio')->name('resign.ratio');

Route::resource('hr_budget', 'Admin\HrbudgetController');
Route::get('hr_budget-create', 'Admin\HrbudgetController@create')->name('hr_budget.create');
Route::get('hr_budget-info', 'Admin\HrbudgetController@index')->name('hr_budget.index');
Route::get('hr_budget-date_search', 'Admin\HrbudgetController@date_search')->name('hr_budget.date_search_hr');
Route::get('/budget_date/{date}', 'Admin\HrbudgetController@budget_remains');

Route::get('hr_budget-assign', 'Admin\HrbudgetController@assign')->name('hr_budget.assign');
Route::get('hr_budget-index-assign', 'Admin\HrbudgetController@assign_index')->name('hr_budget.assign_index');
Route::post('hr_budget-assign-store', 'Admin\HrbudgetController@assign_store')->name('hr_budget.assign_store');


Route::get('letter-appointment', 'Admin\LetterController@appointment')->name('letter.appointment');
Route::get('letter-show_cause', 'Admin\LetterController@show_cause')->name('letter.show_cause');
Route::get('letter-transfer', 'Admin\LetterController@transfer')->name('letter.transfer');
Route::get('letter-joining', 'Admin\LetterController@joining')->name('letter.joining');
Route::get('letter-promotion', 'Admin\LetterController@promotion')->name('letter.promotion');
Route::get('letter-increment', 'Admin\LetterController@increment')->name('letter.increment');
Route::get('employee_id/{employee_id}', 'Admin\LetterController@employee');

Route::resource('employee_movement_register', 'Admin\EmployeeMovementRegisterController');
Route::get('employee_movement_register-create', 'Admin\EmployeeMovementRegisterController@create')->name('employee_movement_register.create');
Route::get('employee_movement_register-info', 'Admin\EmployeeMovementRegisterController@index')->name('employee_movement_register.index');

Route::resource('guest', 'Admin\GuestController');
Route::get('guest-create', 'Admin\GuestController@create')->name('guest.create');
Route::get('guest-info', 'Admin\GuestController@index')->name('guest.index');

Route::resource('payroll', 'Admin\PayrollController');
Route::get('payroll-create', 'Admin\PayrollController@create')->name('payroll.create');
Route::get('payroll-info', 'Admin\PayrollController@index')->name('payroll.index');
Route::get('payroll-payslip-{id}', 'Admin\PayrollController@payslip')->name('payroll.payslip');
Route::get('payroll-report', 'Admin\PayrollController@report')->name('payroll.report');
Route::get('payroll-report-date_search', 'Admin\PayrollController@report_date_search')->name('payroll.report_date_search');
Route::get('payroll-date-search', 'Admin\PayrollController@date_search')->name('payroll.date_search');
Route::get('leave_data/{employee_id}', 'Admin\PayrollController@salary');
Route::get('kpi/{employee_id}', 'Admin\PayrollController@kpi');
Route::get('grade_id/{employee_id}', 'Admin\PayrollController@grade');
Route::get('/attendance_date/{month}', 'Admin\PayrollController@attendance');

Route::resource('designation', 'Admin\DesignationController');
Route::get('designation-create', 'Admin\DesignationController@create')->name('designation.create');
Route::get('designation-info', 'Admin\DesignationController@index')->name('designation.index');

Route::resource('kpi', 'Admin\KpiController');
Route::get('kpi-create', 'Admin\KpiController@create')->name('kpi.create');
Route::get('kpi-info', 'Admin\KpiController@index')->name('kpi.index');
Route::get('designation_id/{department_id}', 'Admin\KpiController@designation');

Route::get('id-card', 'Admin\CardController@idcard')->name('id.create');
Route::get('employee-designation/{employee_id}', 'Admin\CardController@employee_designation');
Route::get('visitng-card', 'Admin\CardController@visitingcard')->name('visiting.create');

Route::resource('grade', 'Admin\GradeController');
Route::get('grade-create', 'Admin\GradeController@create')->name('grade.create');
Route::get('grade-index', 'Admin\GradeController@index')->name('grade.index');

Route::resource('accommodation', 'Admin\AccommodationController');
Route::get('accommodation-create', 'Admin\AccommodationController@create')->name('accommodation.create');
Route::get('accommodation-index', 'Admin\AccommodationController@index')->name('accommodation.index');

Route::resource('ta', 'Admin\TaController');
Route::get('ta-create', 'Admin\TaController@create')->name('ta.create');
Route::get('ta-index', 'Admin\TaController@index')->name('ta.index');

Route::resource('loan_period', 'Admin\LoanperiodController');
Route::get('loan_period-create', 'Admin\LoanperiodController@create')->name('loan_period.create');
Route::get('loan_period-index', 'Admin\LoanperiodController@index')->name('loan_period.index');

Route::resource('loan', 'Admin\LoanController');
Route::get('loan-create', 'Admin\LoanController@create')->name('loan.create');
Route::get('loan-index', 'Admin\LoanController@index')->name('loan.index');

Route::resource('claim', 'Admin\ClaimController');
Route::get('claim-create', 'Admin\ClaimController@create')->name('claim.create');
Route::get('claim-index', 'Admin\ClaimController@index')->name('claim.index');

Route::resource('re_claim', 'Admin\ReclaimController');
Route::get('create-re_claim', 'Admin\ReclaimController@create')->name('re_claim.create');
Route::get('index-re_claim', 'Admin\ReclaimController@index')->name('re_claim.index');
Route::get('/claim_id/{employee_id}', 'Admin\ReclaimController@claim');

Route::get('/end-of-service-employees', 'Admin\EndofserviceController@employees')->name('end_of_service.employees');
Route::get('/end-of-service-report-{id}', 'Admin\EndofserviceController@eos')->name('end_of_service.eos');

Route::resource('task', 'Admin\TaskassignController');
Route::get('task-create', 'Admin\TaskassignController@create')->name('task.create');
Route::get('task-index', 'Admin\TaskassignController@index')->name('task.index');

Route::resource('hr_policy', 'Admin\HrpolicyController');
Route::get('hr_policy-create', 'Admin\HrpolicyController@create')->name('hr_policy.create');
Route::get('hr_policy-index', 'Admin\HrpolicyController@index')->name('hr_policy.index');

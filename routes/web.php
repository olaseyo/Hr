<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/register/{lang?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/login/{lang?}', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/check', 'HomeController@check')->middleware(
    [
        'auth',

    ]
);
Route::get('/password/resets/{lang?}', 'Auth\LoginController@showLinkRequestForm')->name('change.langPass');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home')->middleware(
    [
        'auth',
        //
    ]
);
Route::get('/home/getlanguvage', 'HomeController@getlanguvage')->name('home.getlanguvage');


Route::group(
    [
        'middleware' => [
            'auth',
            //
        ],
    ], function (){

    Route::resource('settings', 'SettingsController');
    Route::post('email-settings', 'SettingsController@saveEmailSettings')->name('email.settings');
    Route::post('company-settings', 'SettingsController@saveCompanySettings')->name('company.settings');
    Route::post('payment-settings', 'SettingsController@savePaymentSettings')->name('payment.settings');
    Route::post('system-settings', 'SettingsController@saveSystemSettings')->name('system.settings');
    Route::get('company-setting', 'SettingsController@companyIndex')->name('company.setting');
    Route::get('company-email-setting/{name}', 'SettingsController@updateEmailStatus')->name('company.email.setting');
    Route::post('pusher-settings', 'SettingsController@savePusherSettings')->name('pusher.settings');
    Route::post('business-setting', 'SettingsController@saveBusinessSettings')->name('business.setting');

    Route::get('test-mail', 'SettingsController@testMail')->name('test.mail');
    Route::post('test-mail', 'SettingsController@testSendMail')->name('test.send.mail');
}
);


Route::get(
    '/test', [
               'as' => 'test.email',
               'uses' => 'SettingsController@testEmail',
           ]
)->middleware(
    [
        'auth',
        //
    ]
);
Route::post(
    '/test/send', [
                    'as' => 'test.email.send',
                    'uses' => 'SettingsController@testEmailSend',
                ]
)->middleware(
    [
        'auth',
        //
    ]
);
// End

Route::resource('user', 'UserController')->middleware(
    [
        'auth',
        //
    ]
);
Route::post('employee/json', 'EmployeeController@json')->name('employee.json')->middleware(
    [
        'auth',
        //
    ]
);
Route::post('branch/employee/json', 'EmployeeController@employeeJson')->name('branch.employee.json')->middleware(
    [
        'auth',
        //
    ]
);
Route::get('employee-profile', 'EmployeeController@profile')->name('employee.profile')->middleware(
    [
        'auth',
        //
    ]
);
Route::get('show-employee-profile/{id}', 'EmployeeController@profileShow')->name('show.employee.profile')->middleware(
    [
        'auth',
        //
    ]
);
Route::get('lastlogin', 'EmployeeController@lastLogin')->name('lastlogin')->middleware(
    [
        'auth',
        //
    ]
);
Route::resource('employee', 'EmployeeController')->middleware(
    [
        'auth',
        
    ]
);
Route::resource('department', 'DepartmentController')->middleware(
    [
        'auth',

    ]
);
Route::resource('designation', 'DesignationController')->middleware(
    [
        'auth',

    ]
);
Route::resource('document', 'DocumentController')->middleware(
    [
        'auth',

    ]
);
Route::resource('branch', 'BranchController')->middleware(
    [
        'auth',

    ]
);
Route::resource('awardtype', 'AwardTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('award', 'AwardController')->middleware(
    [
        'auth',

    ]
);
Route::resource('termination', 'TerminationController')->middleware(
    [
        'auth',

    ]
);
Route::resource('terminationtype', 'TerminationTypeController')->middleware(
    [
        'auth',

    ]
);
Route::post('announcement/getdepartment', 'AnnouncementController@getdepartment')->name('announcement.getdepartment')->middleware(
    [
        'auth',

    ]
);
Route::post('announcement/getemployee', 'AnnouncementController@getemployee')->name('announcement.getemployee')->middleware(
    [
        'auth',

    ]
);
Route::resource('announcement', 'AnnouncementController')->middleware(
    [
        'auth',

    ]
);


Route::get('holiday/calender', 'HolidayController@calender')->name('holiday.calender')->middleware(
    [
        'auth',

    ]
);
Route::resource('holiday', 'HolidayController')->middleware(
    [
        'auth',

    ]
);


Route::get('employee/salary/{eid}', 'SetSalaryController@employeeBasicSalary')->name('employee.basic.salary')->middleware(
    [
        'auth',

    ]
);
Route::get('allowances/create/{eid}', 'AllowanceController@allowanceCreate')->name('allowances.create')->middleware(
    [
        'auth',

    ]
);
Route::get('commissions/create/{eid}', 'CommissionController@commissionCreate')->name('commissions.create')->middleware(
    [
        'auth',

    ]
);
Route::get('loans/create/{eid}', 'LoanController@loanCreate')->name('loans.create')->middleware(
    [
        'auth',

    ]
);
Route::get('saturationdeductions/create/{eid}', 'SaturationDeductionController@saturationdeductionCreate')->name('saturationdeductions.create')->middleware(
    [
        'auth',

    ]
);
Route::get('otherpayments/create/{eid}', 'OtherPaymentController@otherpaymentCreate')->name('otherpayments.create')->middleware(
    [
        'auth',

    ]
);
Route::get('overtimes/create/{eid}', 'OvertimeController@overtimeCreate')->name('overtimes.create')->middleware(
    [
        'auth',

    ]
);

//payslip

Route::resource('paysliptype', 'PayslipTypeController')->middleware(
    [
        'auth',

    ]
);

Route::resource('allowance', 'AllowanceController')->middleware(
    [
        'auth',

    ]
);

Route::resource('commission', 'CommissionController')->middleware(
    [
        'auth',

    ]
);

Route::resource('allowanceoption', 'AllowanceOptionController')->middleware(
    [
        'auth',

    ]
);

Route::resource('loanoption', 'LoanOptionController')->middleware(
    [
        'auth',

    ]
);

Route::resource('deductionoption', 'DeductionOptionController')->middleware(
    [
        'auth',

    ]
);

Route::resource('loan', 'LoanController')->middleware(
    [
        'auth',

    ]
);

Route::resource('saturationdeduction', 'SaturationDeductionController')->middleware(
    [
        'auth',

    ]
);

Route::resource('otherpayment', 'OtherPaymentController')->middleware(
    [
        'auth',

    ]
);

Route::resource('overtime', 'OvertimeController')->middleware(
    [
        'auth',

    ]
);

Route::post('event/getdepartment', 'EventController@getdepartment')->name('event.getdepartment')->middleware(
    [
        'auth',

    ]
);
Route::post('event/getemployee', 'EventController@getemployee')->name('event.getemployee')->middleware(
    [
        'auth',

    ]
);
Route::resource('event', 'EventController')->middleware(
    [
        'auth',

    ]
);
Route::post('meeting/getdepartment', 'MeetingController@getdepartment')->name('meeting.getdepartment')->middleware(
    [
        'auth',

    ]
);
Route::post('meeting/getemployee', 'MeetingController@getemployee')->name('meeting.getemployee')->middleware(
    [
        'auth',

    ]
);
Route::resource('meeting', 'MeetingController')->middleware(
    [
        'auth',

    ]
);

Route::put('employee/update/sallary/{id}', 'SetSalaryController@employeeUpdateSalary')->name('employee.salary.update')->middleware(
    [
        'auth',

    ]
);
Route::get('salary/employeeSalary', 'SetSalaryController@employeeSalary')->name('employeesalary')->middleware(
    [
        'auth',

    ]
);

Route::resource('setsalary', 'SetSalaryController')->middleware(
    [
        'auth',

    ]
);

Route::get('payslip/paysalary/{id}/{date}', 'PaySlipController@paysalary')->name('payslip.paysalary')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/bulk_pay_create/{date}', 'PaySlipController@bulk_pay_create')->name('payslip.bulk_pay_create')->middleware(
    [
        'auth',

    ]
);
Route::post('payslip/bulkpayment/{date}', 'PaySlipController@bulkpayment')->name('payslip.bulkpayment')->middleware(
    [
        'auth',

    ]
);
Route::post('payslip/search_json', 'PaySlipController@search_json')->name('payslip.search_json')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/employeepayslip', 'PaySlipController@employeepayslip')->name('payslip.employeepayslip')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/showemployee/{id}', 'PaySlipController@showemployee')->name('payslip.showemployee')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/editemployee/{id}', 'PaySlipController@editemployee')->name('payslip.editemployee')->middleware(
    [
        'auth',

    ]
);

Route::post('payslip/editemployee/{id}', 'PaySlipController@updateEmployee')->name('payslip.updateemployee')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/pdf/{id}/{m}', 'PaySlipController@pdf')->name('payslip.pdf')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/payslipPdf/{id}', 'PaySlipController@payslipPdf')->name('payslip.payslipPdf')->middleware(
    [
        'auth',

    ]
);
Route::get('payslip/send/{id}/{m}', 'PaySlipController@send')->name('payslip.send')->middleware(
    [
        'auth',

    ]
);
Route::resource('payslip', 'PaySlipController')->middleware(
    [
        'auth',

    ]
);


Route::resource('resignation', 'ResignationController')->middleware(
    [
        'auth',

    ]
);
Route::resource('travel', 'TravelController')->middleware(
    [
        'auth',

    ]
);
Route::resource('promotion', 'PromotionController')->middleware(
    [
        'auth',

    ]
);
Route::resource('transfer', 'TransferController')->middleware(
    [
        'auth',

    ]
);
Route::resource('complaint', 'ComplaintController')->middleware(
    [
        'auth',

    ]
);
Route::resource('warning', 'WarningController')->middleware(
    [
        'auth',

    ]
);

Route::get('profile', 'UserController@profile')->name('profile')->middleware(
    [
        'auth',

    ]
);
Route::put('edit-profile', 'UserController@editprofile')->name('update.account')->middleware(
    [
        'auth',

    ]
);


Route::resource('accountlist', 'AccountListController')->middleware(
    [
        'auth',

    ]
);
Route::get('accountbalance', 'AccountListController@account_balance')->name('accountbalance')->middleware(
    [
        'auth',

    ]
);


Route::get('leave/{id}/action', 'LeaveController@action')->name('leave.action')->middleware(
    [
        'auth',

    ]
);
Route::post('leave/changeaction', 'LeaveController@changeaction')->name('leave.changeaction')->middleware(
    [
        'auth',

    ]
);
Route::post('leave/jsoncount', 'LeaveController@jsoncount')->name('leave.jsoncount')->middleware(
    [
        'auth',

    ]
);
Route::resource('leave', 'LeaveController')->middleware(
    [
        'auth',

    ]
);
Route::get('ticket/{id}/reply', 'TicketController@reply')->name('ticket.reply')->middleware(
    [
        'auth',

    ]
);
Route::post('ticket/changereply', 'TicketController@changereply')->name('ticket.changereply')->middleware(
    [
        'auth',

    ]
);
Route::resource('ticket', 'TicketController')->middleware(
    [
        'auth',

    ]
);

Route::get('attendanceemployee/bulkattendance', 'AttendanceEmployeeController@bulkAttendance')->name('attendanceemployee.bulkattendance')->middleware(
    [
        'auth',

    ]
);
Route::post('attendanceemployee/bulkattendance', 'AttendanceEmployeeController@bulkAttendanceData')->name('attendanceemployee.bulkattendance')->middleware(
    [
        'auth',

    ]
);

Route::post('attendanceemployee/attendance', 'AttendanceEmployeeController@attendance')->name('attendanceemployee.attendance')->middleware(
    [
        'auth',

    ]
);

Route::resource('attendanceemployee', 'AttendanceEmployeeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('timesheet', 'TimeSheetController')->middleware(
    [
        'auth',

    ]
);


Route::resource('expensetype', 'ExpenseTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('incometype', 'IncomeTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('paymenttype', 'PaymentTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('leavetype', 'LeaveTypeController')->middleware(
    [
        'auth',

    ]
);

Route::resource('payees', 'PayeesController')->middleware(
    [
        'auth',

    ]
);
Route::resource('payer', 'PayerController')->middleware(
    [
        'auth',

    ]
);
Route::resource('deposit', 'DepositController')->middleware(
    [
        'auth',

    ]
);
Route::resource('expense', 'ExpenseController')->middleware(
    [
        'auth',

    ]
);
Route::resource('transferbalance', 'TransferBalanceController')->middleware(
    [
        'auth',

    ]
);


Route::group(
    [
        'middleware' => [
            'auth',

        ],
    ], function (){
    Route::get('change-language/{lang}', 'LanguageController@changeLanquage')->name('change.language');
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language');
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data');
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language');
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language');
    Route::delete('/lang/{lang}', 'LanguageController@destroyLang')->name('lang.destroy');
}
);

Route::resource('roles', 'RoleController')->middleware(
    [
        'auth',

    ]
);
Route::resource('permissions', 'PermissionController')->middleware(
    [
        'auth',

    ]
);



Route::put('change-password', 'UserController@updatePassword')->name('update.password');

Route::resource('account-assets', 'AssetController')->middleware(
    [
        'auth',

    ]
);
Route::resource('document-upload', 'DucumentUploadController')->middleware(
    [
        'auth',

    ]
);
Route::resource('indicator', 'IndicatorController')->middleware(
    [
        'auth',

    ]
);
Route::resource('appraisal', 'AppraisalController')->middleware(
    [
        'auth',

    ]
);
Route::resource('goaltype', 'GoalTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('goaltracking', 'GoalTrackingController')->middleware(
    [
        'auth',

    ]
);
Route::resource('company-policy', 'CompanyPolicyController')->middleware(
    [
        'auth',

    ]
);
Route::resource('trainingtype', 'TrainingTypeController')->middleware(
    [
        'auth',

    ]
);
Route::resource('trainer', 'TrainerController')->middleware(
    [
        'auth',

    ]
);

Route::put('training/status', 'TrainingController@updateStatus')->name('training.status')->middleware(
    [
        'auth',

    ]
);
Route::resource('training', 'TrainingController')->middleware(
    [
        'auth',

    ]
);




Route::get('report/income-expense', 'ReportController@incomeVsExpense')->name('report.income-expense')->middleware(
    [
        'auth',

    ]
);
Route::get('report/leave', 'ReportController@leave')->name('report.leave')->middleware(
    [
        'auth',

    ]
);
Route::get('employee/{id}/leave/{status}/{type}/{month}/{year}', 'ReportController@employeeLeave')->name('report.employee.leave')->middleware(
    [
        'auth',

    ]
);
Route::get('report/account-statement', 'ReportController@accountStatement')->name('report.account.statement')->middleware(
    [
        'auth',

    ]
);
Route::get('report/payroll', 'ReportController@payroll')->name('report.payroll')->middleware(
    [
        'auth',

    ]
);
Route::get('report/monthly/attendance', 'ReportController@monthlyAttendance')->name('report.monthly.attendance')->middleware(
    [
        'auth',

    ]
);
Route::get('report/timesheet', 'ReportController@timesheet')->name('report.timesheet')->middleware(
    [
        'auth',

    ]
);

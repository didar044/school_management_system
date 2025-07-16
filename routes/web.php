<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Batch\ClasseController;
use App\Http\Controllers\Batch\ShiftController;
use App\Http\Controllers\Batch\SectionController;
use App\Http\Controllers\Student\ApplicationController;
use App\Http\Controllers\Student\FrequenceController;
use App\Http\Controllers\Student\ExpenseController;
use App\Http\controllers\Employee\EmployeeshiftController;
use App\Http\controllers\Employee\Employee_categorieController;
use App\Http\controllers\Employee\EmployeeController;
use App\Http\controllers\Employee\TeacherController;
use App\Http\controllers\Schedule\SubjectController;
use App\Http\controllers\Schedule\RoomController;
use App\Http\controllers\Schedule\PeriodController;
use App\Http\controllers\Schedule\ScheduleController;
use App\Http\controllers\Schedule\RoutineController;
use App\Http\controllers\Student\Student_PaymentController;
use App\Http\controllers\Attendance\EmployeeAttendanceController;
use App\Http\controllers\Payment\EmployeeSalarieController;
use App\Http\controllers\Payment\EmployeeSalariePaymentController;
use App\Http\controllers\Leave\LeaveCategorieController;
use App\Http\controllers\Leave\LeaveApplicationController;
use App\Http\controllers\Leave\LeaveTransactionController;
use App\Http\controllers\Payment\EmployeeFestivalBonuseController;
use App\Http\controllers\Payment\EmployeeDeductionController;
use App\Http\controllers\Payment\PaymentMethodController;
use App\Http\Controllers\Employee\EmployeeAdministratorController;
use App\Http\Controllers\Providentfund\EmployeeProvidentFundController;
use App\Http\Controllers\Exam\StudentExamTypeController;
use App\Http\Controllers\Exam\StudentExamScheduleController;
use App\Http\Controllers\Result\StudentExamResultController;
use App\Http\Controllers\Report\ResultReportController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Attendance\StudentAttendanceController;
use App\Http\Controllers\Fee\FeecollectionController;
use App\Http\Controllers\Library\BookController;
use App\Http\Controllers\Library\BookIssueController;
use App\Http\Controllers\AllTableData\TableDataController;

use App\Http\Controllers\AuthController;





// Route::get('/', function () {
//     return view('homes.home');
// });

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'loging'])->name('login.submit');
    Route::get('/showregister', [AuthController::class, 'showregister'])->name('register');
    Route::post('/showregister', [AuthController::class, 'register'])->name('register.submit');

});



Route::middleware('auth')->group(function(){


    Route::match(['get', 'head'], '/', function () {
        return view('homes.home');
    });
    Route::get('/', [DashboardController::class, 'dashboard']);
    Route::resource('classes',ClasseController::class);
    Route::resource('shifts',ShiftController::class);
    Route::resource('sections',SectionController::class);
    Route::resource('applications',ApplicationController::class);
    Route::get('/get-sections/{shift_id}', [ApplicationController::class, 'getSections']);
    Route::resource('frequences',FrequenceController::class);
    Route::resource('expenses',ExpenseController::class);
    Route::resource('categories',Employee_categorieController::class);
    Route::resource('employees',EmployeeController::class);
    Route::resource('teachers',TeacherController::class);
    Route::resource('employeeshifts',EmployeeshiftController::class);
    Route::resource('subjects',SubjectController::class);
    Route::resource('rooms',RoomController::class);
    Route::resource('periods',PeriodController::class);
    Route::resource('schedulemanages',ScheduleController::class);
    Route::get('/get-sections/{shift_id}', [ScheduleController::class, 'getSections']);
    //Route::resource('routines',RoutineController::class);
    Route::get('/routines', [RoutineController::class, 'index'])->name('routines.index');
    Route::get('/routines/filter', [RoutineController::class, 'filterByDay'])->name('routines.filter');
    Route::resource('studentpayments', Student_PaymentController::class);
    Route::resource('employeeattendances', EmployeeAttendanceController::class);
    Route::resource('employeesalaries', EmployeeSalarieController::class);
    Route::get('/get-category-salary/{id}', [EmployeeSalarieController::class, 'getCategorySalary']);
    Route::resource('employeesalarypayments', EmployeeSalariePaymentController::class);
    Route::resource('leavecategories', LeaveCategorieController::class);
    Route::resource('leaveapplications', LeaveApplicationController::class);
    Route::resource('leavetransactions', LeaveTransactionController::class);
    Route::resource('employeefestivalbonuses', EmployeeFestivalBonuseController ::class);
    Route::resource('employeedeductions', EmployeeDeductionController ::class);
    Route::resource('paymentmethods', PaymentMethodController ::class);
    Route::resource('employeeadministrators', EmployeeAdministratorController ::class);
    Route::resource('employeeprovidentfunds', EmployeeProvidentFundController ::class);
    Route::resource('studentexamtypes', StudentExamTypeController ::class);
    Route::resource('studentexamschedules', StudentExamScheduleController ::class);
    Route::resource('studentexamresults', StudentExamResultController ::class);
    Route::resource('resultreports',ResultReportController::class);
    Route::resource('students',StudentController::class);
    Route::resource('studentattendances',StudentAttendanceController::class);
    Route::resource('feecollections',FeecollectionController::class);
    Route::resource('books',BookController::class);
    Route::resource('bookissues',BookIssueController::class);
    Route::get('bookissues/return/{id}', [BookIssueController::class, 'returnBook'])->name('bookissues.return');



    Route::get('/table-data', [TableDataController::class, 'index'])->name('admin.table-data.index');
    Route::post('/table-data', [TableDataController::class, 'showData'])->name('admin.table-data.show');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});



    










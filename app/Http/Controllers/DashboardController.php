<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee\Employee;
use App\Models\Student\Application;
use App\Models\Student\Student;
use App\Models\Payment\EmployeeSalaryPayment;
use App\Models\Payment\EmployeeSalaryPaymentDetail;
use App\Models\Student\Student_Payment;

class DashboardController extends Controller
{


    public function dashboard()
            {

                $salarypayments = EmployeeSalaryPayment::all();
    
                $totalsalarypaid = 0;
                foreach ($salarypayments as $salarypayment) {
                    $totalsalarypaid += $salarypayment->net_salary ;
                }
                 
               
                $salarypaymentdetail=EmployeeSalaryPaymentDetail::all();
                $tax=0;
                 foreach ($salarypaymentdetail as $taxtable) {
                    $tax += $taxtable->tax;
                }

                $provident_fund=0;
                 foreach ($salarypaymentdetail as $provident) {
                    $provident_fund += $provident->provident_fund;
                }



                         //Fees Calculetion    
                    $students = Student::with(['class.expense', 'payments'])->get();            
                    $totalcollection=Student_Payment::sum('paid_amount');
                    $fullPaidCount = $students->filter(function ($student) {
                        $expectedFee = optional($student->class->expense)->totalExpectedFee() ?? 0;
                        $paidAmount = $student->payments->sum('paid_amount');
                        return $paidAmount >= $expectedFee;
                    })->count();

                    $paidStudentIds = $students->filter(function($student) {
                        return $student->payments->count() > 0;
                    })->pluck('id')->toArray();

                    $unpaidStudentsCount = $students->whereNotIn('id', $paidStudentIds)->count();

                    $partialPaidCount = count($paidStudentIds) - $fullPaidCount;
                        
                    //Total Due
                    $totalDue = 0;
                    foreach ($students as $student) {
                        $expectedFee = optional($student->class->expense)->totalExpectedFee() ?? 0;
                        $paidAmount = $student->payments->sum('paid_amount');
                        $due = max(0, $expectedFee - $paidAmount);
                        $totalDue += $due;
                    }
                    
                  $netIncome= $totalcollection - $totalsalarypaid;

                $data=[
                    "employeescount" => Employee::count(),
                    "teachercount" => Employee::whereIn('employee_categorie_id', ['1', '2', '3'])->count(),
                    "soupportstafcount" => Employee::whereIn('employee_categorie_id', [5, 4])->count(),
                    "maintenancestaffcount" => Employee::where('employee_categorie_id', '6')->count(),
                    "applicationsCount"=>Application::count(),
                    "applicationgirlsCount"=>Application::where('gender','Female')->count(),
                    "applicationboyesCount"=>Application::where('gender', 'Male')->count(),
                    "applicationothersCount"=>Application::where('gender','Other')->count(),
                    "studentsCount"=>Student::count(),
                    "studentgirlsCount"=>Student::where('gender','Female')->count(),
                    "studentboyesCount"=>Student::where('gender','Male')->count(),
                    "studentothersCount"=>Student::where('gender','Other')->count(),
                    "totalsalarypaid"=>$totalsalarypaid,
                    "tax"=>$tax,
                    "provident_fund"=>$provident_fund,
                    "totalcollection"=>$totalcollection,
                    "fullPaidCount"=>$fullPaidCount,
                    "partialPaidCount"=>$partialPaidCount,
                    "totalDue"=>$totalDue,
                    "netIncome"=>$netIncome,
                    
                ];

               return view('homes.home', compact('data'));
            }
}

<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Student;

class ResultReportController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('search'); 
        $examYear = $request->query('exam_year');

        if (!$id) {
            return view('pages.report.resultreport.index', ['student' => null]);
        }

        
        $student = Student::with([
            'class',
            'shift',
            'section',
            'examResults.examType',
            'examResults.markDetails.subject'
        ])->find($id);
        
        if ($student && $examYear) {
            $student->examResults = $student->examResults->where('exam_year', $examYear)->values();
        }

        return view('pages.report.resultreport.index', compact('student'));
    }
}

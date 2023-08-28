<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    // Display student top 20 students rank according to total marks std wise
    public function index($standard = null)
    {
        if (!empty($standard)) {
            $students = Student::where('standard', $standard)
                ->where('user_id', Auth::user()->id)
                ->orderBy('total_marks', 'desc')
                ->get();
        } else {
            $students = Student::where('user_id', Auth::user()->id)->orderBy('total_marks', 'desc')->get();
        }

        // Calculate ranks based on total marks
        $rank = 1;
        $prevTotalMarks = PHP_INT_MAX; // Set a large initial value

        foreach ($students as $student) {
            if ($student->total_marks < $prevTotalMarks) {
                $student->rank = $rank;
                $prevTotalMarks = $student->total_marks;
                $rank++;
            } else {
                // Students with the same total marks will have the same rank
                $student->rank = $rank - 1;
            }

        }

        return view('student.index', compact('students'));
    }

    // Student view
    public function create()
    {
        return view('student.add');
    }

    // Add Student
    public function store(Request $request)
    {
        $student = new Student();
        $student->user_id = Auth::user()->id;
        $student->name = $request->name;
        $student->standard = $request->standard;
        $student->total_marks = $request->total_marks;
        $student->save();

        return redirect()->back()->with('message', 'Student data added successfully');
    }
}

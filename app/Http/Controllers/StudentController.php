<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //insert
    public function insertStudent()
    {
        // $student = new Student;

        // $student->name = 'Afnan Khan';
        // $student->address = 'khulna,bangladesh';
        // $student->save();

        Student::create([
            'name' => 'arman khan',
            'address' => 'dhaka,bangladesh'
        ]);

        return "Student Insert Successfully!";
    }

    //data fatech or read from database
    public function allStudents()
    {
        $students = Student::all();

        return view('student', compact('students'));
    }

    //update data
    public function updateStudent($id)
    {
        $student = Student::findOrFail($id);

        $student->name = 'Rahim khan';
        $student->save();

        return "Student Updated Successfully!";
    }

    //delete
    public function studentDelete($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return "Student Deleted Successfully!";
    }
}

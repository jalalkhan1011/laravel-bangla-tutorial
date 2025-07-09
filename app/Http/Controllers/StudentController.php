<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function insertStudent()
    {
        // $student = new Student;
        // $student->name = 'Kamal hossain';
        // $student->address = 'Khulna,Bangladesh';
        // $student->save();

        Student::create([
            'name'=>'Kobir Hossain',
            'address' => 'Khulna,Bangladesh'
        ]);

        return "Student data insert successfully";
    }

    public function allStudents()
    {
        $students = Student::all();

        return view('allstudents', compact('students'));
    }

    public function updateStudent($id)
    {
        $student = Student::findOrFail($id);

        $student->name = "arif hasan";
        $student->save();

        return "student updated successfully";
    }

    public function deleteStudent($id){
        $student = Student::findOrFail($id);

        $student->delete();

        return "student deleted successfully";
    }
}

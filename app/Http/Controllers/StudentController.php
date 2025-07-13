<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //index for studnet list
    public function index()
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    //student crate
    public function create()
    {
        return view('student.create');
    }

    //student store
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|min:3',
            'student_email' => 'required|email|unique:students,student_email',
        ]);

        Student::create([
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'student_address' => $request->student_address
        ]);

        return redirect(route('student.index'));
    }

    //studetn show
    public function show($id)
    {
        $student = Student::findOrFail($id);

        return view('student.show', compact('student'));
    }

    //student edit
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    //student update
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'student_name' => 'required|min:3',
            'student_email' => 'required|email|unique:students,student_email,' . $student->id,
        ]);

        $student->update([
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'student_address' => $request->student_address
        ]);

        return redirect(route('student.index'));
    }

    // student delete
    public function delete($id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect(route('student.index'));
    }
}

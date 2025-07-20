<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect(route('students.index'))->with('success','Student Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // $student = Student::findOrFail($id);
       

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        return redirect(route('students.index'))->with('warning','Student updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect(route('students.index'))->with('error','Student deleted successfully');
    }
}

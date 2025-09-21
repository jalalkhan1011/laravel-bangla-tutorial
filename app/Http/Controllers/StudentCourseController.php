<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentCategories = Student::with('courses')->paginate(10);
        // dd($studentCategories);
        return view('admin.studentCourse.index', compact('studentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::pluck('student_name', 'id');
        $courses = Course::pluck('course_name', 'id');

        return view('admin.studentCourse.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'courses' => 'required'
        ]);

        $student = Student::find($request->student_id);
        $student->courses()->attach($request->courses);

        return redirect(route('student.course.index'))->with('success', 'student course crated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::with('courses')->find($id);
        $students = Student::pluck('student_name', 'id');
        $selectedStudent = $student->id;
        $courses = Course::pluck('course_name', 'id');
        $selectedCourses = $student->courses->pluck('id')->toArray();

        return view('admin.studentCourse.edit', compact('student', 'selectedStudent', 'students', 'courses', 'selectedCourses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $studentId = Student::with('courses')->find($id);
        $request->validate([
            'student_id' => 'required',
            'courses' => 'required'
        ]);

        $student = Student::find($studentId->id);
       
        $student->courses()->sync($request->courses);

        return redirect(route('student.course.index'))->with('success', 'student course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $studentId = Student::with('courses')->find($id);
        $studentId->courses()->detach(); 
        
        return redirect()->back()->with('error', 'student course deleted successfully');

    }
}

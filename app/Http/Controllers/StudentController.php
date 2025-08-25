<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        // $students = Student::all();

        $students = Student::where('student_name', 'like', '%' . $search . '%')
            ->orWhere('student_email', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('student.index', compact('students', 'search'));
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
            'student_image' => 'nullable|image|mimes:png,jpeg,gif,jpg',
            'parent_image' => 'nullable|image|mimes:png,jpeg,gif,jpg',
            'student_mul_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        // Student::create([
        //     'student_name' => $request->student_name,
        //     'student_email' => $request->student_email,
        //     'student_address' => $request->student_address
        // ]);
        $data = $request->all();

        if ($request->hasFile('student_image')) {
            $image = $request->student_image;

            $imageName = time() . rand(1, 99) . '.' . $image->extension();
            $image->move(public_path('upload/studentImage/'), $imageName);

            $data['student_image'] = $imageName;
        }

        if ($request->hasFile('parent_image')) {
            $image = $request->parent_image;
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            $imagePath = 'upload/student/parent/' . $imageName;

            Storage::disk('public')->put($imagePath, file_get_contents($image));

            $data['parent_image'] = $imagePath;
        }

        $studnetId = Student::create($data);

        if ($request->hasFile('student_mul_image')) {
            foreach ($request->file('student_mul_image') as $index => $file) {
                // $image = $request->student_mul_image;
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('upload/studentMulImage/'), $imageName);

                StudentImage::create([
                    'student_mul_image' => $imageName,
                    'student_id' => $studnetId->id
                ]);
            }
        }

        return redirect(route('students.index'))->with('success', 'Student Created Successfully!');
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
    public function edit(Student $student)
    {
        // $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // $student = Student::findOrFail($id);

        $request->validate([
            'student_name' => 'required|min:3',
            'student_email' => 'required|email|unique:students,student_email,' . $student->id,
            'student_image' => 'nullable|image|mimes:png,jpeg,gif,jpg',
            'parent_image' => 'nullable|image|mimes:png,jpeg,gif,jpg',
            'student_mul_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        // $student->update([
        //     'student_name' => $request->student_name,
        //     'student_email' => $request->student_email,
        //     'student_address' => $request->student_address
        // ]);
        $data = $request->all();
        if ($request->hasFile('student_image')) {
            unlink(public_path('upload/studentImage/' . $student->student_image));
            $image = $request->student_image;

            $imageName = time() . rand(1, 99) . '.' . $image->extension();
            $image->move(public_path('upload/studentImage/'), $imageName);

            $data['student_image'] = $imageName;
        }

        if ($request->hasFile('parent_image')) {
            if ($student->parent_image && Storage::disk('public')->exists($student->parent_image)) {
                Storage::disk('public')->delete($student->parent_image);
            }

            $image = $request->parent_image;
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

            $imagePath = 'upload/student/parent/' . $imageName;

            Storage::disk('public')->put($imagePath, file_get_contents($image));

            $data['parent_image'] = $imagePath;
        }

        $student->update($data);

        if ($request->hasFile('student_mul_image')) {
            $oldImages = StudentImage::where('student_id', $student->id)->get();
            foreach ($oldImages as $oldImage) {
                unlink(public_path('upload/studentMulImage/' . $oldImage->student_mul_image));
                $oldImage->delete();
            }

            foreach ($request->file('student_mul_image') as $index => $file) {

                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('upload/studentMulImage/'), $imageName);

                StudentImage::create([
                    'student_mul_image' => $imageName,
                    'student_id' => $student->id
                ]);
            }
        }


        return redirect(route('students.index'))->with('warning', 'Student updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // $student = Student::findOrFail($id);
        if ($student->student_image) {
            unlink(public_path('upload/studentImage/' . $student->student_image));
        }


        if ($student->parent_image && Storage::disk('public')->exists($student->parent_image)) {
            Storage::disk('public')->delete($student->parent_image);
        }

        $oldImages = StudentImage::where('student_id', $student->id)->get();
        if (!empty($oldImages)) {
            foreach ($oldImages as $oldImage) {
                unlink(public_path('upload/studentMulImage/' . $oldImage->student_mul_image));
                $oldImage->delete();
            }
        }


        $student->delete();

        return redirect(route('students.index'))->with('error', 'Student deleted successfully');
    }
}

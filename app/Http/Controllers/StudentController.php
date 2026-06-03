<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
   public function index()
{
    $students = Student::latest()->get();

    return view('students.index', compact('students'));
}

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_no' => ['required', 'string', 'max:50', 'unique:students,student_no'],
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['nullable', 'email', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:50'],
        ]);

        Student::create($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'تمت إضافة الطالب بنجاح');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_no' => ['required', 'string', 'max:50', 'unique:students,student_no,' . $student->id],
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['nullable', 'email', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:50'],
        ]);

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'تم تعديل بيانات الطالب بنجاح');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'تم حذف الطالب بنجاح');
    }
}
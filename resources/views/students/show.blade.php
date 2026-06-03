@extends('layouts.app')

@section('title', 'عرض طالب')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">بيانات الطالب</h5>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">رقم الطالب</th>
                <td>{{ $student->student_no }}</td>
            </tr>
            <tr>
                <th>الاسم</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>البريد الإلكتروني</th>
                <td>{{ $student->email ?? '-' }}</td>
            </tr>
            <tr>
                <th>الهاتف</th>
                <td>{{ $student->phone ?? '-' }}</td>
            </tr>
            <tr>
                <th>تاريخ الإضافة</th>
                <td>{{ $student->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">تعديل</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">رجوع</a>
    </div>
</div>

@endsection
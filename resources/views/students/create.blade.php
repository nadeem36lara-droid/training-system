@extends('layouts.app')

@section('title', 'إضافة طالب')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">إضافة طالب جديد</h5>
    </div>

    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">رقم الطالب</label>
                <input type="text" name="student_no" value="{{ old('student_no') }}"
                       class="form-control @error('student_no') is-invalid @enderror">
                @error('student_no')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">اسم الطالب</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">رجوع</a>
        </form>
    </div>
</div>

@endsection
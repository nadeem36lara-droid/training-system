@extends('layouts.app')

@section('title', 'قائمة الطلاب')

@section('content')

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">قائمة الطلاب</h5>
        <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">إضافة طالب</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="studentsTable" class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>رقم الطالب</th>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>الهاتف</th>
                        <th width="220">الإجراءات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->student_no }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email ?? '-' }}</td>
                            <td>{{ $student->phone ?? '-' }}</td>
                            <td>
                                <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">عرض</a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">تعديل</a>

                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('هل أنت متأكد من حذف الطالب؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new DataTable('#studentsTable', {
            pageLength: 10,
            ordering: true,
            searching: true,
            lengthChange: true,
            language: {
                search: "بحث:",
                lengthMenu: "عرض _MENU_ سجل",
                info: "عرض _START_ إلى _END_ من أصل _TOTAL_ سجل",
                infoEmpty: "لا توجد سجلات",
                zeroRecords: "لا توجد نتائج مطابقة",
                emptyTable: "لا توجد بيانات",
                paginate: {
                    first: "الأول",
                    last: "الأخير",
                    next: "التالي",
                    previous: "السابق"
                }
            }
        });
    });
</script>
@endpush
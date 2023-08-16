@extends('layouts.admin')

@section('title', 'تعديل طلب التوطيف')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">طلبات التوطيف</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل طلب التوطيف</small>
    </h1>
@endsection


@section('content')




<div class="row">


    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                {{-- <div class="main-content-label mg-b-5">
                    إضافة خبر جديد
                </div> --}}
                <p class="mg-b-20"></p>
                <form action="{{ route('job-requests.update', [$job->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">الاسم</label>
                                <input class="form-control mb-3" name="fullname" value="{{ $job->fullname }}" placeholder="الاسم كامل" required type="text">
                                <label for="" class="mb-2">الايميل</label>
                                <input class="form-control mb-3" name="email" value="{{ $job->email }}" placeholder="البريد الالكتروني" required type="email">


                                <label for="" class="mb-2">الجنس</label>
                                <select class="form-control mb-3" name="gender" required>
                                    <option value="male" {{ $job->gender == 'male' ? 'selected' : '' }}>ذكر</option>
                                    <option value="female" {{ $job->gender == 'female' ? 'selected' : '' }}>انثى</option>
                                </select>

                                <label for="" class="mb-2">تاريخ الميلاد</label>
                                <input class="form-control mb-3" type="date" required name="birthdate" value="{{ $job->birthdate }}">
                            </div>
                        </div>




                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">رقم الجوال</label>
                                <input class="form-control mb-3" name="phone_number" value="{{ $job->phone_number }}" placeholder="رقم الجوال" required type="text">
                                <label for="" class="mb-2">السيرة الذاتية</label>
                                <input class="form-control mb-3" type="file" accept=".jpg, .png, image/jpeg, image/png" name="resume" style="font-size: 18px">

                                <label for="" class="mb-2">المؤهل العلمي</label>
                                <select class="form-control mb-3" name="degree" required>
                                    <option value="bachelor" {{ $job->degree == 'bachelor' ? 'selected' : '' }}>بكالوريوس</option>
                                    <option value="diploma" {{ $job->degree == 'diploma' ? 'selected' : '' }}>دبلوم</option>
                                    <option value="college_student" {{ $job->degree == 'college_student' ? 'selected' : '' }}>طالب جامعي</option>
                                    <option value="high_school" {{ $job->degree == 'high_school' ? 'selected' : '' }}>ثانوية عامة</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

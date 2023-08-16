@extends('layouts.admin')

@section('title', 'تعديل طلب التطوع')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">طلبات التطوع</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل طلب التطوع</small>
    </h1>
@endsection


@section('content')



<div class="row">


    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <p class="mg-b-20"></p>
                <form action="{{ route('volunteer-requests.update', [$volunteer->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">الاسم</label>
                                <input class="form-control mb-3" name="fullname" value="{{ $volunteer->fullname }}" placeholder="الاسم كامل" required type="text">
                                <label for="" class="mb-2">الايميل</label>
                                <input class="form-control mb-3" name="email" value="{{ $volunteer->email }}" placeholder="البريد الالكتروني" required type="email">


                                <label for="" class="mb-2">هل تدربت من قبل؟</label>
                                <select class="form-control mb-3" name="volunteered_before" required>
                                    <option value="1" {{ $volunteer->volunteered_before == 1 ? 'selected' : '' }}>نعم</option>
                                    <option value="0" {{ $volunteer->volunteered_before == 0 ? 'selected' : '' }}>لا</option>
                                </select>
                                <label for="" class="mb-2">تفاصيل التدريب</label>
                                <textarea class="form-control mb-3" name="volunteered_details" placeholder="تفاصيل التدريب" required rows="3">{{ $volunteer->volunteered_details }}</textarea>

                                <label for="" class="mb-2">بداية التدريب</label>
                                <input class="form-control mb-3" type="date" required name="volunteered_start" value="{{ $volunteer->volunteered_start }}">

                                <label for="" class="mb-2">العنوان</label>
                                <textarea class="form-control mb-3" name="address" placeholder="العنوان" required rows="3">{{ $volunteer->address }}</textarea>
                            </div>
                        </div>




                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">رقم الجوال</label>
                                <input class="form-control mb-3" name="phone_number" value="{{ $volunteer->phone_number }}" placeholder="رقم الجوال" required type="text">
                                <label for="" class="mb-2">السيرة الذاتية</label>
                                <input class="form-control mb-3" type="file" accept=".jpg, .png, image/jpeg, image/png" name="resume" style="font-size: 18px">



                                <label for="" class="mb-2">هل لديك مهارات؟</label>
                                <select class="form-control mb-3" name="skills" required>
                                    <option value="1" {{ $volunteer->skills == 1 ? 'selected' : '' }}>نعم</option>
                                    <option value="0" {{ $volunteer->skills == 0 ? 'selected' : '' }}>لا</option>
                                </select>
                                <label for="" class="mb-2">تفاصيل المهارات</label>
                                <textarea  class="form-control mb-3" name="skills_details" placeholder="تفاصيل المهارات" required rows="3">{{ $volunteer->skills_details }}</textarea>

                                <label for="" class="mb-2">نهاية التدريب</label>
                                <input class="form-control mb-3" type="date" required name="volunteered_end" value="{{ $volunteer->volunteered_end }}">

                                <label for="" class="mb-2">الخبرة الدراسية</label>
                                <textarea class="form-control mb-3" name="study_experience" placeholder="الخبرة الدراسية" required rows="3">{{ $volunteer->study_experience }}</textarea>

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

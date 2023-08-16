@extends('layouts.admin')

@section('title', 'تعديل طلب الشراكة')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">طلبات الشراكة</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل طلب الشراكة</small>
    </h1>
@endsection


@section('content')



<div class="row">
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="card">
            <div class="card-body">

                <p class="mg-b-20"></p>
                <form action="{{ route('partner-requests.update', [$partner->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-sm">

                        <div class="col-lg-6">
                            <div class="form-group mg-b-0">
                                <label for="" class="mb-2">اسم المنظمة</label>
                                <input class="form-control mb-3" name="organization_name" value="{{ $partner->organization_name }}" required type="text">
                                <label for="" class="mb-2">عنوان الفرع الرئيسي</label>
                                <input class="form-control mb-3" name="address_main_branch" value="{{ $partner->address_main_branch }}" required type="text">



                                <label for="" class="mb-2">الموقع الالكتروني</label>
                                <input class="form-control mb-3" name="website" value="{{ $partner->website }}" required type="text">

                                <label for="" class="mb-2">الفيس بوك</label>
                                <input class="form-control mb-3" name="facebook" value="{{ $partner->facebook }}" required type="text">

                                <label for="" class="mb-2">الانستجرام</label>
                                <input class="form-control mb-3" name="instagram" value="{{ $partner->instagram }}" required type="text">



                                <label for="" class="mb-2">رقم شهادة التسجيل لدى وزارة المالية</label>
                                <input class="form-control mb-3" name="ministry_finance_no" value="{{ $partner->ministry_finance_no }}" required type="number">

                                <label for="" class="mb-2">الهيكل التنظيمي لشركتك</label>
                                <input class="form-control mb-3" type="file" accept=".jpg, .png, image/jpeg, image/png" name="company_organizational_structure" style="font-size: 18px">



                                <label for="" class="mb-2">عدد المشاريع الحالية</label>
                                <input class="form-control mb-3" name="number_current_projects" value="{{ $partner->number_current_projects }}" required type="number">

                                <label for="" class="mb-2">عناوين المواقع</label>
                                <textarea class="form-control mb-3" name="center_locations"  required rows="3">{{ $partner->center_locations }}</textarea>

                                <label for="" class="mb-2">المانحون الرئيسيون من مشاريع سابقة</label>
                                <textarea class="form-control mb-3" name="donors"  required rows="3">{{ $partner->donors }}</textarea>

                                <label for="" class="mb-2">عدد الموظفين التي تتعامل معهم</label>
                                <textarea class="form-control mb-3" name="numberemployees_you_deal_with"  required rows="3">{{ $partner->numberemployees_you_deal_with }}</textarea>


                            </div>
                        </div>




                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                            <div class="form-group mg-b-0">

                                <label for="" class="mb-2">نوع المؤسسة</label>
                                <select class="form-control mb-3" name="organization_type" required>
                                    @foreach ($organization as $item)
                                    <option value="{{ $item->id }}" {{ $partner->organizationType_id == $item->id ? 'selected' : '' }} >{{ $item->value_ar }}</option>
                                    @endforeach
                                </select>


                                <label for="" class="mb-2">سنة التأسيس</label>
                                <input class="form-control mb-3" name="year_founded" value="{{ $partner->year_founded }}" required type="date">


                                <label for="" class="mb-2">التكلفة السنوية</label>
                                <input class="form-control mb-3" name="annual_budget" value="{{ $partner->annual_budget }}" required type="number">

                                <label for="" class="mb-2">عدد المراكز</label>
                                <input class="form-control mb-3" name="number_centers" value="{{ $partner->number_centers }}" required type="number">

                                <label for="" class="mb-2">عدد الموظفين</label>
                                <input class="form-control mb-3" name="number_employees" value="{{ $partner->number_employees }}" required type="number">


                                <label for="" class="mb-2">رقم شهادة التسجيل لدى وزارة الداخلية</label>
                                <input class="form-control mb-3" name="ministry_interior_no" value="{{ $partner->ministry_interior_no }}" required type="number">

                                <label for="" class="mb-2">شهادة تسجيل منظمتكو/علم وخبر من وزارة الداخلية</label>
                                <input class="form-control mb-3" type="file" accept=".jpg, .png, image/jpeg, image/png" name="company_registration_certificate_ministry_interior" style="font-size: 18px">


                                <label style="visibility: hidden">......</label>
                                <input style="visibility: hidden" class="form-control mb-2">



                                <label for="" class="mb-2">جنسيات الموظفين</label>
                                <textarea class="form-control mb-3" name="nationalities_beneficiaries"  required rows="3">{{ $partner->nationalities_beneficiaries }}</textarea>

                                <label for="" class="mb-2">اعمار المستفيدين</label>
                                <textarea class="form-control mb-3" name="beneficiary_age_group"  required rows="3">{{ $partner->beneficiary_age_group }}</textarea>

                                <label for="" class="mb-2">اهداف المؤسسة خلال الثلاث سنوات القادمة</label>
                                <textarea class="form-control mb-3" name="upcoming_goals"  required rows="3">{{ $partner->upcoming_goals }}</textarea>


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

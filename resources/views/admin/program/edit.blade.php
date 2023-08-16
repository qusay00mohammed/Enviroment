@extends('layouts.admin')

@section('title', 'تعديل برنامج')

@push('css')
@endpush

@push('javascript')
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">برامجنا</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل برنامج</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('programs.update', [$program->id]) }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        {{ csrf_field() }}
                        @method('PUT')
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label mb-3">العنوان باللغة العربية</label>
                                <input type="text" class="form-control" id="inputName" value="{{ $program->title_ar }}"
                                    name="title_ar" title="يرجي ادخال العنوان باللغة العربية" required>
                            </div>

                            <div class="col">
                                <label for="asd" class="control-label mb-3">العنوان باللغة الانجليزية</label>
                                <input type="text" class="form-control" id="asd" name="title_en"
                                    value="{{ $program->title_en }}" title="يرجي ادخال رقم العناون باللغة الانجليزية"
                                    required>
                            </div>
                        </div>

                        <br>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea" class="mb-3">الوصف باللغة العربية</label>
                                <textarea class="form-control" id="exampleTextarea" name="description_ar"
                                    rows="3" required>{{ $program->description_ar }}</textarea>
                            </div>
                            <div class="col">
                                <label for="exampleTextar123123ea" class="mb-3">الوصف باللغة الانجليزية</label>
                                <textarea class="form-control" id="exampleTextar123123ea" name="description_en"
                                    rows="3" required>{{ $program->description_en }}</textarea>
                            </div>
                        </div>

                        <br>

                        {{-- 3 --}}
                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{ asset("storage/images/programs/$program->image") }})"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="تغيير الصورة">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="إلغاء الصورة">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                title="حذف الصورة">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->


                        <br>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.admin')

@section('title', 'إضافة الى المكتبة')

@push('css')
@endpush

@push('javascript')
    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            autoProcessQueue: false,
            url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: null, // MB
            addRemoveLinks: true, // 0!
            accept: function(file, done) {
                "wow.jpg" == file.name ? done("Naha, you don't.") : done();
            }
        });

        function performStore() {
            let data = new FormData();
            data.append('title_ar', $('input[name="title_ar"]').val());
            data.append('title_en', $('input[name="title_en"]').val());
            data.append('description_ar', $('textarea[name="description_ar"]').val());
            data.append('description_en', $('textarea[name="description_en"]').val());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
            }

            // console.log(files);
            store('/admin/libraries', data);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">المكتبة المرئية</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة الى المكتبة</small>
    </h1>
@endsection


@section('content')


    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="create_form" onsubmit="event.preventDefault(); performStore();">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label mb-3">العنوان باللغة العربية</label>
                                <input type="text" class="form-control" id="inputName" name="title_ar"
                                    title="يرجي ادخال العنوان باللغة العربية" required>
                            </div>

                            <div class="col">
                                <label for="asd" class="control-label mb-3">العنوان باللغة الانجليزية</label>
                                <input type="text" class="form-control" id="asd" name="title_en"
                                    title="يرجي ادخال العنوان باللغة الانجليزية" required>
                            </div>
                        </div>

                        <br>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea" class="mb-3">الوصف باللغة العربية</label>
                                <textarea class="form-control" id="exampleTextarea" name="description_ar" rows="3" required></textarea>
                            </div>
                            <div class="col">
                                <label for="exampleTextar123123ea" class="mb-3">الوصف باللغة الانجليزية</label>
                                <textarea class="form-control" id="exampleTextar123123ea" name="description_en" rows="3" required></textarea>
                            </div>
                        </div>

                        <br>

                        {{-- 3 --}}
                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <!--begin::Form-->
                        {{-- <form class="form" action="#" method="post"> --}}
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_dropzonejs_example_1">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->

                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bolder text-gray-900 mb-1">قم بإسقاط الملفات هنا أو انقر للتحميل.
                                        </h3>
                                        <span class="fs-7 fw-bold text-gray-400">تحميل ما يصل إلى 10 ملفات</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        {{-- </form> --}}
                        <!--end::Form-->




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

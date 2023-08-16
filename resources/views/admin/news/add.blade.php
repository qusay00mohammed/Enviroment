@extends('layouts.admin')

@section('title', 'إضافة خبر')

@push('css')
    <style>
        .tagify {
            overflow: auto !important;
            height: 100px !important;
        }

        .tox-statusbar {
            display: none !important;
        }
    </style>
@endpush

@push('javascript')
    {{-- Text Editor --}}
    <script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

    <script>
        var input_ar = document.querySelector('input[name=keywords_ar]');
        var input_en = document.querySelector('input[name=keywords_en]');

        // initialize Tagify on the above input node reference
        new Tagify(input_ar)
        new Tagify(input_en)
    </script>
    <script>

            var options = {selector: "#editor"};
            if (KTApp.isDarkMode()) {
                options["skin"] = "oxide-dark";
                options["content_css"] = "dark";
            }
            tinymce.init(options);


            var options2 = {selector: "#editor2"};

            if (KTApp.isDarkMode()) {
                options["skin"] = "oxide-dark";
                options["content_css"] = "dark";
            }

            tinymce.init(options2);


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
            data.append('short_description_ar', $('input[name="short_description_ar"]').val());


            data.append('description_ar', tinymce.get('editor').getContent());
            data.append('description_en', tinymce.get('editor2').getContent());


            data.append('keywords_ar', $('input[name="keywords_ar"]').val());
            data.append('title_en', $('input[name="title_en"]').val());
            data.append('short_description_en', $('input[name="short_description_en"]').val());
            data.append('keywords_en', $('input[name="keywords_en"]').val());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
            }


            store('/admin/news', data);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاخبار</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة خبر</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="create_form" onsubmit="event.preventDefault(); performStore();">
                        @csrf
                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">
                                    <input class="form-control mb-2" name="title_ar"
                                        placeholder="عنوان الخبر باللغة العربية" required type="text">
                                    <input class="form-control mb-2" name="short_description_ar"
                                        placeholder="الخبر بالاختصار باللغة العربية" required type="text">

                                    <textarea id="editor" name="description_ar" placeholder="تفاصيل الخبر باللغة العربية" class="tox-target"></textarea>
                                    <input class="form-control mt-2" name='keywords_ar' style="padding: 2px!important;"
                                        placeholder="الكلمات المفتاحية باللغة العربية">

                                </div>
                            </div>

                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <div class="form-group mg-b-0">
                                    <input class="form-control mb-2" name="title_en"
                                        placeholder="عنوان الخبر باللغة الانجليزية" required type="text">
                                    <input class="form-control mb-2" name="short_description_en"
                                        placeholder="الخبر بالاختصار باللغة الانجليزية" required type="text">

                                    <textarea id="editor2" name="description_en" placeholder="الوصف باللغة الانجليزية" class="tox-target"></textarea>

                                    <input class="form-control mt-2" name='keywords_en' style="padding: 2px!important;"
                                        placeholder="الكلمات المفتاحية باللغة الانجليزية">

                                </div>
                            </div>
                        </div>
                        <p class="text-danger mt-3">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
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


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="حفظ البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

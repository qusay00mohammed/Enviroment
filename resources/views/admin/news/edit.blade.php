@extends('layouts.admin')

@section('title', 'تعديل خبر')

@push('css')
    <style>
        .tagify {
            overflow: auto !important;
            height: 100px !important;
        }

        .tox-statusbar {
            display: none !important;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .image {
            max-width: 100%;
            height: auto;
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
        var options = {
            selector: "#editor"
        };
        if (KTApp.isDarkMode()) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }
        tinymce.init(options);


        var options2 = {
            selector: "#editor2"
        };

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

        function performUpdate(id) {

            let formData = new FormData();
            formData.append('title_ar', $('input[name="title_ar"]').val());
            formData.append('short_description_ar', $('input[name="short_description_ar"]').val());


            formData.append('description_ar', tinymce.get('editor').getContent());
            formData.append('description_en', tinymce.get('editor2').getContent());


            formData.append('keywords_ar', $('input[name="keywords_ar"]').val());
            formData.append('title_en', $('input[name="title_en"]').val());
            formData.append('short_description_en', $('input[name="short_description_en"]').val());
            formData.append('keywords_en', $('input[name="keywords_en"]').val());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]); // Append each file to the FormData object
            }

            // updateURL = "{{ route('news.update', [$news->id]) }}";
            redirectUrl = "{{ route('news.index') }}";

            // console.log(data.title_ar);
            // console.log(data);


            update('/admin/news/' + id, formData, redirectUrl);

        }

        function deleteImage(id, ref) {
            destroyImage('/admin/image/delete/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاخبار</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل خبر</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form onsubmit="event.preventDefault(); performUpdate('{{ $news->id }}');">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="row row-sm">

                            <div class="col-lg-6">
                                <div class="form-group mg-b-0">
                                    <label for="" class="mb-3">عنوان الخبر باللغة العربية</label>
                                    <input class="form-control mb-2" name="title_ar" value="{{ $news->title_ar }}"
                                        placeholder="عنوان الخبر باللغة العربية" required type="text">
                                    <label for="" class="mb-3">الخبر باختصار باللغة العربية</label>
                                    <input class="form-control mb-2" name="short_description_ar"
                                        value="{{ $news->short_description_ar }}"
                                        placeholder="الخبر بالاختصار باللغة العربية" required type="text">

                                    <label for="" class="mb-3">وصف الخبر باللغة العربية</label>
                                    <textarea id="editor" name="description_ar" placeholder="تفاصيل الخبر باللغة العربية" class="tox-target">{{ $news->description_ar }}</textarea>
                                    <label for="" class="mb-3" style="margin-top: 10px">الكلمات المفتاحية باللغة
                                        العربية</label>
                                    <input class="form-control" name='keywords_ar' style="padding: 2px!important;"
                                        value="{{ $news->keywords_ar }}" placeholder="الكلمات المفتاحية باللغة العربية">

                                </div>
                            </div>

                            <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                <div class="form-group mg-b-0">
                                    <label for="" class="mb-3">عنوان الخبر باللغة الانجليزية</label>
                                    <input class="form-control mb-2" name="title_en" value="{{ $news->title_en }}"
                                        placeholder="عنوان الخبر باللغة الانجليزية" required type="text">
                                    <label for="" class="mb-3">الخبر باختصار باللغة الانجليزية</label>
                                    <input class="form-control mb-2" name="short_description_en"
                                        value="{{ $news->short_description_en }}"
                                        placeholder="الخبر بالاختصار باللغة الانجليزية" required type="text">
                                    <label for="" class="mb-3">وصف الخبر باللغة الانجليزية</label>
                                    <textarea id="editor2" name="description_en" placeholder="الوصف باللغة الانجليزية" class="tox-target">{{ $news->description_en }}</textarea>
                                    <label for="" class="mb-3" style="margin-top: 10px">الكلمات المفتاحية باللغة
                                        الانجليزية</label>
                                    <input class="form-control" name='keywords_en' style="padding: 2px!important;"
                                        value="{{ $news->keywords_en }}" placeholder="الكلمات المفتاحية باللغة الانجليزية">

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


                        @foreach ($news->images as $image)
                            <div class="image-container">
                                <img height="100px" width="100px" class="mt-2"
                                    src="{{ asset("storage/images/news/$image->filename") }}">
                                <a class="delete-button" onclick="deleteImage('{{ $image->id }}', this)">x</a>
                            </div>
                        @endforeach


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <input type="submit" value="تعديل البيانات" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

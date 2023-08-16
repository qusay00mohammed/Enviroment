@extends('layouts.admin')

@section('title', 'تعديل على المكتبة')

@push('css')
<style>
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


        function deleteImage(id, ref) {
            destroyImage('/admin/image/delete/'+id,ref);
    }

        function performUpdate() {
            let data = new FormData();
            data.append('title_ar', $('input[name="title_ar"]').val());
            data.append('title_en', $('input[name="title_en"]').val());
            data.append('description_ar', $('textarea[name="description_ar"]').val());
            data.append('description_en', $('textarea[name="description_en"]').val());

            var files = myDropzone.getAcceptedFiles(); // Get the selected files

            for (var i = 0; i < files.length; i++) {
                data.append('files[]', files[i]); // Append each file to the FormData object
            }

            updateURL = "{{ route('libraries.update', [$library->id]) }}";
            redirectUrl = "{{ route('libraries.index') }}";

            update(updateURL, data, redirectUrl);

            // update('/admin/libraries', data);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">المكتبة المرئية</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">تعديل على المكتبة</small>
    </h1>
@endsection


@section('content')


    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form onsubmit="event.preventDefault(); performUpdate();">
                        @csrf
                        {{-- 1 --}}
                        <div class="row">
                            <div class="col">
                                <label for="inputName" class="control-label mb-3">العنوان باللغة العربية</label>
                                <input type="text" class="form-control" id="inputName" name="title_ar"
                                    title="يرجي ادخال العنوان باللغة العربية" required value="{{ $library->title_ar }}">
                            </div>

                            <div class="col">
                                <label for="asd" class="control-label mb-3">العنوان باللغة الانجليزية</label>
                                <input type="text" class="form-control" id="asd" name="title_en"
                                    title="يرجي ادخال العنوان باللغة الانجليزية" required value="{{ $library->title_en }}">
                            </div>
                        </div>

                        <br>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea" class="mb-3">الوصف باللغة العربية</label>
                                <textarea class="form-control" id="exampleTextarea" name="description_ar" rows="3" required>{{ $library->description_ar }}</textarea>
                            </div>
                            <div class="col">
                                <label for="exampleTextar123123ea" class="mb-3">الوصف باللغة الانجليزية</label>
                                <textarea class="form-control" id="exampleTextar123123ea" name="description_en" rows="3" required>{{ $library->description_en }}</textarea>
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

                        @foreach ($library->images as $image)
                            <div class="image-container mt-3">
                                <img height="100px" width="100px"
                                    src="{{ asset("storage/images/libraries/$image->filename") }}">
                                <a class="delete-button" onclick="deleteImage('{{ $image->id }}', this)">x</a>
                            </div>
                        @endforeach


                        <br>
                        <br>

                        {{-- Submit --}}
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

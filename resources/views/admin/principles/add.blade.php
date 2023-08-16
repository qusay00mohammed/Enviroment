@extends('layouts.admin')

@section('title', 'إضافة مبدأ')

@push('css')
@endpush

@push('javascript')
    <script>
        function performStore() {
            let data = {
                description_ar: $('textarea[name="description_ar"]').val(),
                description_en: $('textarea[name="description_en"]').val(),
                title_ar: $('input[name="title_ar"]').val(),
                title_en: $('input[name="title_en"]').val(),
            }
            store('/admin/principles', data);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">مبادئنا وقيمنا</small>

        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إضافة مبدأ</small>
    </h1>
@endsection


@section('content')

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="create_form" onsubmit="event.preventDefault(); performStore();">
                        @csrf
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

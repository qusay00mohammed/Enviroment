@extends('layouts.admin')

@section('title', 'إنجازاتنا')

@push('css')
@endpush

@push('javascript')
    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/achievements/' + id, ref);
        }

        function performStore() {
            let data = new FormData();
            data.append('title_ar', $('input[name="title_ar"]').val());
            data.append('title_en', $('input[name="title_en"]').val());
            data.append('number', $('input[name="number"]').val());
            data.append('image', $('input[name="image"]')[0].files[0]);

            store('/admin/achievements', data);
        }

        $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var title_ar = button.data('title_ar')
            var title_en = button.data('title_en')
            var achievement_id = button.data('achievement_id')
            var number = button.data('number')
            // var image = button.data('image')
            var modal = $(this)
            modal.find('.modal-body #title_ar').val(title_ar);
            modal.find('.modal-body #title_en').val(title_en);
            modal.find('.modal-body #achievement_id').val(achievement_id);
            modal.find('.modal-body #number').val(number);
            // modal.find('.modal-body #image').val(image);
        })
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#kt_datatable_example_5').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ Route('achievements.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'title_ar',
                        name: 'title_ar'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false

                    }
                ],
                "language": {
                    "lengthMenu": "عرض _MENU_",
                },
                "dom": "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });

        });
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">إنجازاتنا</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')

    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a data-bs-toggle="modal" data-bs-target="#kt_modal_1" class="btn btn-primary" title=""
                data-bs-original-title="إضافة إنجاز">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black">
                        </rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->إضافة</a>
        </div>


        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th>الصورة</th>
                    <th>العنوان</th>
                    <th>عدد الانجازات</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <!-- dataTables -->
            </tbody>
        </table>
    </div>


    {{-- add --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة إنجاز</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form id="create_form" onsubmit="event.preventDefault(); performStore()">
                    <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الانجاز باللغة العربية</label>
                            <input class="form-control" type="text" name="title_ar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الانجاز باللغة الانجليزية</label>
                            <input class="form-control" type="text" name="title_en" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عدد الانجازات</label>
                            <input class="form-control" type="number" name="number" required>
                        </div>

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12">
                            {{-- <input type="file" name="image" class="dropify"
                                accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" required /> --}}

                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <!--end::Image preview wrapper-->

                                <!--begin::Edit button-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="تغيير الصورة">
                                    <i class="bi bi-pencil-fill fs-7"></i>

                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" required />
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
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    {{-- edit --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة إنجاز</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('achievements.update', 'test') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <input type="hidden" name="achievement_id" id="achievement_id" required>

                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الانجاز باللغة العربية</label>
                            <input class="form-control" type="text" name="title_ar" id="title_ar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الانجاز باللغة الانجليزية</label>
                            <input class="form-control" type="text" name="title_en" id="title_en" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عدد الانجازات</label>
                            <input class="form-control" type="number" name="number" id="number" required>
                        </div>

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12">
                            {{-- <input type="file" name="image" class="dropify"
                                accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" required /> --}}

                            <!--begin::Image input-->
                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                <!--begin::Image preview wrapper-->
                                <div class="image-input-wrapper w-125px h-125px"></div>
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
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

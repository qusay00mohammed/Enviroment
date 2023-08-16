@extends('layouts.admin')

@section('title', 'الاهداف الاساسية')

@push('css')
@endpush

@push('javascript')
    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/goals/' + id, ref);
        }

        function performStore() {
            let data = {
                title_ar: $('input[name="title_ar"]').val(),
                title_en: $('input[name="title_en"]').val(),
            }
            store('/admin/goals', data);
        }

        $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var title_ar = button.data('title_ar')
            var title_en = button.data('title_en')
            var goal_id = button.data('goal_id')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #title_ar').val(title_ar);
            modal.find('.modal-body #title_en').val(title_en);
            // modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #goal_id').val(goal_id);
        })
    </script>

    <script type="text/javascript">
        $(function() {
            var table = $('#kt_datatable_example_5').DataTable({

                processing: true,
                serverSide: true,
                ajax: "{{ Route('goals.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title_ar',
                        name: 'title_ar'
                    },
                    {
                        data: 'date',
                        name: 'date'
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
        <small class="text-muted fs-7 fw-bold my-1 ms-1">الاهداف الاساسية</small>
        <!--end::Description-->
    </h1>
@endsection


@section('content')

@include('layouts.alert')

    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1" title=""
                data-bs-original-title="إضافة هدف اساسي">
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
                    <th>العنوان</th>
                    <th>تاريخ النشر</th>
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
                    <h5 class="modal-title">إضافة هدف اساسي</h5>

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
                            <label for="" class="mb-3">عنوان الهدف باللغة العربية</label>
                            <input class="form-control" type="text" name="title_ar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الهدف باللغة الانجليزية</label>
                            <input class="form-control" type="text" name="title_en" required>
                        </div>
                        <br>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- update --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل هدف اساسي</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('goals.update', 'test') }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="goal_id" id="goal_id">
                            <label for="" class="mb-3">عنوان الهدف باللغة العربية</label>
                            <input class="form-control" type="text" name="title_ar" id="title_ar" required>
                        </div>

                        <div class="form-group">
                            <label for="" class="mb-3">عنوان الهدف باللغة الانجليزية</label>
                            <input class="form-control" type="text" name="title_en" id="title_en" required>
                        </div>
                        <br>
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

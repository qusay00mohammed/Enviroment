@extends('layouts.admin')

@section('title', 'الاهداف الفرعية')

@push('css')
@endpush

@push('javascript')

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/list-goal/' + id, ref);
        }

        function performStore()
    {
        let data ={
            description_goal_ar: $('input[name="description_goal_ar"]').val(),
            description_goal_en: $('input[name="description_goal_en"]').val(),
            goal_id: $('#goal_id_add').val(),
        }
        store('/admin/list-goal',data);
    }

    $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var description_goal_id = button.data('description_goal_id')
            var description_goal_ar = button.data('description_goal_ar')
            var description_goal_en = button.data('description_goal_en')
            var goal_id = button.data('goal_id')
            // var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #description_goal_ar').val(description_goal_ar);
            modal.find('.modal-body #description_goal_en').val(description_goal_en);
            modal.find('.modal-body #description_goal_id').val(description_goal_id);
            // modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #goal_id').val(goal_id);
        })


    </script>

<script type="text/javascript">
    $(function() {
        var table = $('#kt_datatable_example_5').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ Route('list-goal.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'description_goal_ar',
                    name: 'description_goal_ar'
                },
                {
                    data: 'basic_goal',
                    name: 'basic_goal'
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
    <small class="text-muted fs-7 fw-bold my-1 ms-1">الاهداف الفرعية</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')
@include('layouts.alert')
    <div class="card p-3">


        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <a class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#kt_modal_1" title="" data-bs-original-title="إضافة هدف فرعي">
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                </svg>
            </span>
            <!--end::Svg Icon-->إضافة</a>
        </div>


        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th>عنوان الهدف</th>
                    <th>الهدف الاساسي</th>
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
                        <h5 class="modal-title">إضافة هدف فرعي</h5>

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
                                <label for="" class="mb-2">عنوان الهدف باللغة العربية</label>
                                <input class="form-control mb-3" type="text" name="description_goal_ar" required>
                            </div>

                            <div class="form-group">
                                <label for="" class="mb-2">عنوان الهدف باللغة الانجليزية</label>
                                <input class="form-control mb-3" type="text" name="description_goal_en" required>
                            </div>

                            <label class="my-1" for="inlineFormCustomSelectPref">الهدف الاساسي</label>

                            <select name="goal_id" id="goal_id_add" class="form-control" required>
                                <option value="" selected disabled> --حدد الهدف--</option>
                                @foreach ($goals as $g)
                                    <option value="{{ $g->id }}">{{ $g->title_ar }}</option>
                                @endforeach
                            </select>

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
                        <h5 class="modal-title">تعديل هدف فرعي</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <form action="{{ route('list-goal.update', 'test') }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="description_goal_id" id="description_goal_id">
                                <label for="" class="mb-2">عنوان الهدف باللغة العربية</label>
                                <input class="form-control" type="text" name="description_goal_ar" id="description_goal_ar" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="" class="mb-2">عنوان الهدف باللغة الانجليزية</label>
                                <input class="form-control" type="text" name="description_goal_en" id="description_goal_en" required>
                            </div>

                            <label class="my-1 mt-3" for="inlineFormCustomSelectPref">الهدف الاساسي</label>
                            <select name="goal_id" id="goal_id" class="form-control" required>
                                @foreach ($goals as $g)
                                    <option value="{{ $g->id }}">{{ $g->title_ar }}</option>
                                @endforeach
                            </select>

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

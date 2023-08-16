@extends('layouts.admin')

@section('title', 'موقعنا')

@push('css')
@endpush

@push('javascript')

<script>
    $('#kt_modal_2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var value_ar = button.data('value_ar')
            var value_en = button.data('value_en')
            var contact_detail_id = button.data('contact_detail_id')
            var modal = $(this)
            modal.find('.modal-body #value_ar').val(value_ar);
            modal.find('.modal-body #value_en').val(value_en);
            modal.find('.modal-body #contact_detail_id').val(contact_detail_id);
        })
</script>

<script type="text/javascript">
    $(function() {
        var table = $('#kt_datatable_example_5').DataTable({
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
    <small class="text-muted fs-7 fw-bold my-1 ms-1">موقعنا</small>
    <!--end::Description-->
</h1>
@endsection


@section('content')
@include('layouts.alert')
    <div class="card p-3">
        <table id="kt_datatable_example_5" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th>العنوان باللغة العربية</th>
                    <th>العنوان باللغة الأنجليزية</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contact_details as $key => $contact_detail)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $contact_detail->value_ar }}</td>
                        <td>{{ $contact_detail->value_en }}</td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer; color: rgb(78, 78, 229)"
                                data-contact_detail_id="{{ $contact_detail->id }}"
                                data-value_en="{{ $contact_detail->value_en }}"
                                data-value_ar="{{ $contact_detail->value_ar }}"
                            >تعديل</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- update --}}
    <div class="modal fade" tabindex="-1" id="kt_modal_2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تعديل موقعنا</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <form action="{{ route('contact-details.update', 'test') }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="mb-2">العنوان باللغة العربية</label>
                            <input class="form-control" type="text" id="value_ar" name="value_ar" required>
                            <input type="hidden" id="contact_detail_id" name="contact_detail_id" required>
                        </div>

                        <div class="form-group" class="mt-3">
                            <label for="" class="mb-2">العنوان باللغة الانجليزية</label>
                            <input class="form-control" type="text" id="value_en" name="value_en" required>
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

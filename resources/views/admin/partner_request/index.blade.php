@extends('layouts.admin')

@section('title', 'طلبات الشراكة')

@push('css')
@endpush

@push('javascript')
    <script>
        var table = $('#kt_datatable_example_5').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ Route('getPartnerDatatable') }}",

            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'organization_name',
                    name: 'organization_name'
                },
                {
                    data: 'address_main_branch',
                    name: 'address_main_branch'
                },
                {
                    data: 'year_founded',
                    name: 'year_founded'
                },
                {
                    data: 'website',
                    name: 'website'
                },
                {
                    data: 'annual_budget',
                    name: 'annual_budget'
                },
                {
                    data: 'number_centers',
                    name: 'number_centers'
                },
                {
                    data: 'number_employees',
                    name: 'number_employees'
                },
                {
                    data: 'number_current_projects',
                    name: 'number_current_projects'
                },
                {
                    data: 'company_registration_certificate_ministry_interior',
                    name: 'company_registration_certificate_ministry_interior'
                },
                {
                    data: 'company_organizational_structure',
                    name: 'company_organizational_structure'
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
    </script>

    <script>
        function performDestroy(id, ref) {
            confirmDestroy('/admin/partner-requests/' + id, ref);
        }
    </script>
@endpush


@section('toolbar')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">بيئتي
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->
        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">طلبات الشراكة</small>
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
                    <th>اسم المؤسسة</th>
                    <th>عنوان المقر الرئيسي</th>
                    <th>سنة التأسيس</th>
                    <th>الموقع الالكتروني</th>
                    <th>الميزانية السنوية</th>
                    <th>عدد المراكز</th>
                    <th>عدد الموظفين</th>
                    <th>عدد المشاريع الحالية</th>
                    <th>شهادة الداخلية</th>
                    <th>الهيكل التنظيمي</th>
                    <th>العمليات</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTables -->
            </tbody>
        </table>
    </div>

@endsection

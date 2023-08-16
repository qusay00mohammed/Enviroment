<!--begin::Javascript-->
<script>var hostUrl = "{{ asset('assets/') }}";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->

{{-- Axios --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

{{-- CRUD  --}}
<script src="{{ asset('assets/crud.js') }}"></script>

{{-- SWEETALERT --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

{{-- FontAwesome --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- DataTables JS --}}
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>




@stack('javascript')

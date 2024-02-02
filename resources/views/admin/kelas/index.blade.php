@php
$forms = ['No', 'Slug', 'Nama', 'Tingkat', 'Jurusan', 'Tahun', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms">
    @section('form')
    @include('admin.kelas.form')
    @endsection

    @push('scripts')
    <script>
        $(document).ready(function () {
            $('.year-picker').datepicker({
                format: 'yyyy',
                viewMode: "years",
                minViewMode: "years",
                autoclose: true,
            });
        });
    </script>
    @endpush

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.kelas.index') }}";
        const modalTitle = 'Kelas';
        const forms = ['nama', 'tingkat', 'jurusan_id', 'tahun'];
        const dataColumn = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'slug',
                name: 'slug'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'tingkat',
                name: 'tingkat'
            },
            {
                data: 'jurusan',
                name: 'jurusan'
            },
            {
                data: 'tahun',
                name: 'tahun'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];
    </script>
    @endsection

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <x-head-content title="{{ trans('messages.class_page') }}"
                description="{{ trans('messages.class_description') }}" />
        </div>
    </div>
</x-app-layout>
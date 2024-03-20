@php
$forms = ['No', 'Nama', 'Image', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms">
    @section('form')
    @include('admin.mata_praktikum.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.mata-praktikum.index') }}";
        const modalTitle = 'Mata Praktikum';
        const forms = ['nama','image'];
        const dataColumn = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'image',
                name: 'image'
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
            <x-head-content title="{{ trans('messages.practical_lesson_page') }}"
                description="{{ trans('messages.practical_lesson_description') }}" />
        </div>
    </div>
</x-app-layout>
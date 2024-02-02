@php
$forms = ['No', 'Nama', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms">
    @section('form')
    @include('admin.periode.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.periode.index') }}";
        const modalTitle = 'Periode';
        const forms = ['nama'];
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
            <x-head-content title="{{ trans('messages.period_page') }}"
                description="{{ trans('messages.period_description') }}" />
        </div>
    </div>
</x-app-layout>
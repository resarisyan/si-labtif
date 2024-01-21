@php
$forms = ['No', 'Nama', 'Email', 'Username', 'Jabatan', 'Status', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$status = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :forms="$forms" :status="$status">
    @section('form')
    @include('admin.asisten.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.asisten.index') }}";
        const modalTitle = 'Asisten';
        const relationName = 'asisten';
        const forms = ['name', 'username','email', 'password','relation:jabatan'];
        const dataColumn = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'jabatan',
                name: 'jabatan',
            },
            {
                data: 'is_active',
                name: 'is_active',
                orderable: false,
                searchable: false
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
            <x-head-content title="{{ trans('messages.assistant') }}"
                description="{{ trans('messages.assistant_description') }}" />
        </div>
    </div>
</x-app-layout>
@php
$forms = ['No', 'Nama', 'NPM', 'Kelas', 'Status', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$status = true;
$delete = true;
$import = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms"
    :status="$status" :import="$import">
    @section('form')
    @include('admin.mahasiswa.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.mahasiswa.index') }}";
        const modalTitle = 'Mahasiswa';
        const relationName = 'mahasiswa';
        const forms = ['name', 'relation:npm', 'relation:kelas_id'];
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
                data: 'npm',
                name: 'npm'
            },
            {
                data: 'kelas',
                name: 'kelas'
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
            <x-head-content title="{{ trans('messages.student_page') }}"
                description="{{ trans('messages.student_description') }}" />
        </div>
    </div>
</x-app-layout>
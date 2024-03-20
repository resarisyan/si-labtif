@php
$forms = ['No', 'Kelas', 'Mata Praktikum', 'Ruangan', 'Asisten 1', 'Asisten 2', 'Status', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$status = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms"
    :status="$status">
    @section('form')
    @include('admin.penjadwalan.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.penjadwalan.index', $periode) }}";
        const modalTitle = 'Penjadwalan';
        const relationName = 'penjadwalan';
        const forms = ['kelas_id', 'mata_praktikum_id','ruangan_id', 'asisten_1_id','asisten_2_id', 'hari', 'jam_mulai', 'jam_berakhir'];
        const dataColumn = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'kelas',
                name: 'kelas'
            },
            {
                data: 'mata_praktikum',
                name: 'mata_praktikum'
            },
            {
                data: 'ruangan',
                name: 'ruangan'
            },
            {
                data: 'asisten_1',
                name: 'asisten_1',
            },
            {
                data: 'asisten_2',
                name: 'asisten_2',
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
            <x-head-content title="{{ trans('messages.schedule_page') }}"
                description="{{ trans('messages.schedule_description') }}" />
        </div>
    </div>
</x-app-layout>
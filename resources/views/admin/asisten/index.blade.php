@php
$forms = ['No', 'Nama', 'Email', 'Username', 'Jabatan', 'Status', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$status = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms"
    :status="$status">
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

    @section('customBeginEdit')
    $('.asisten_create').fadeIn().hide();
    $('.asisten_edit').fadeIn().show();
    @endsection

    @section('customCreate')
    $('.asisten_create').fadeIn().show();
    $('.asisten_edit').fadeIn().hide();
    @endsection

    @push('scripts')
    <script>
        $(document).ready(function() {
        $('#user_id').select2({
            ajax: {
                url: '{{ route('admin.mahasiswa.search') }}', // Ganti dengan URL endpoint Anda untuk pencarian data tenaga pendidik
                method: 'GET',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    var query = {
                        search: params.term // Menyertakan parameter pencarian dari inputan
                    };
                    return query;
                },
                processResults: function(res) {
                    console.log(res.data)
                    return {
                        results: res.data.map(function(data) {
                            return {
                                id: data.id,
                                text: data.username + ' - ' + data.name,
                            };
                        })
                    };
                },
                cache: true
            },
            placeholder: 'Pilih Mahasiswa...',
            minimumInputLength: 2,
        });
    });
    </script>
    @endpush

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <x-head-content title="{{ trans('messages.assistant_page') }}"
                description="{{ trans('messages.assistant_description') }}" />
        </div>
    </div>
</x-app-layout>
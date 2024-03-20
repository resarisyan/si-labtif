@php
$forms = ['No', 'Question', 'Answer', 'Action'];
$dataTable = true;
$create = true;
$edit = true;
$delete = true;
@endphp

<x-app-layout :dataTable="$dataTable" :create="$create" :edit="$edit" :delete="$delete" :forms="$forms">
    @section('form')
    @include('admin.home.faq.form')
    @endsection

    @section('dataTable')
    <script type="text/javascript">
        const url = "{{ route('admin.home.faq.index') }}";
        const modalTitle = 'Faq';
        const forms = ['question', 'answer'];
        const dataColumn = [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'question',
                name: 'question'
            },
            {
                data: 'answer',
                name: 'answer'
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
            <x-head-content title="{{ trans('messages.faq_page') }}"
                description="{{ trans('messages.faq_description') }}" />
        </div>
    </div>
</x-app-layout>
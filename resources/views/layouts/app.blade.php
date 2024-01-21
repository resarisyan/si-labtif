@props(['dataTable', 'create', 'edit', 'delete', 'deleteAll', 'forms', 'status'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>

    <body class="nk-body bg-lighter npc-general has-sidebar ">
        <div class="nk-app-root">
            <div class="nk-main">
                @include('layouts.navigation')
                <div class="nk-wrap">
                    @include('layouts.header')

                    <main class="nk-content">
                        <div class="nk-content">
                            <div class="container-fluid">
                                <div class="nk-content-inner">
                                    <div class="nk-content-body">
                                        {{ $slot }}
                                        @isset($dataTable)
                                        <div class="nk-block nk-block-lg">
                                            <div class="nk-block-head">
                                                <div class="nk-block-head-content">
                                                    <div class="card-toolbar">
                                                        @isset($create)
                                                        <a class="btn btn-sm btn-primary" href="javascript:void(0)"
                                                            id="btnCreate">
                                                            <em class="icon ni ni-plus"></em><span>Tambah</span>
                                                        </a>
                                                        @endisset

                                                        @isset($import)
                                                        <a href="javascript:void(0)" id="btnImport"
                                                            class="btn btn-sm btn-success">
                                                            Import
                                                        </a>
                                                        @endisset

                                                        @isset($export)
                                                        <a href="javascript:void(0)" id="btnExport"
                                                            class="btn btn-sm btn-warning">
                                                            Export
                                                        </a>
                                                        @endisset

                                                        @isset($deleteAll)
                                                        <a href="javascript:void(0)" id="btnDeleteAll"
                                                            class="btn btn-sm btn-danger">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>
                                                        </a>
                                                        @endisset

                                                        @isset($deleteAll)
                                                        <a href="javascript:void(0)" id="btnDeleteAll"
                                                            class="btn btn-sm btn-danger">
                                                            <em class="icon ni ni-trash"></em><span>DeleteAll</span>
                                                        </a>
                                                        @endisset
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-bordered card-preview">
                                                <div class="card-inner">
                                                    @isset($forms)
                                                    <table id="dataTable" class="nowrap nk-tb-list nk-tb-ulist">
                                                        <thead>
                                                            <tr class="nk-tb-item nk-tb-head">
                                                                @foreach ($forms as $form)
                                                                <th class="nk-tb-col tb-col-mb">{{ $form }}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    @include('layouts.footer')
                </div>
            </div>
        </div>

        @if (isset($create) || isset($edit))
        <div class="modal fade" id="modalForm">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalHeading">Modal Title</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form id="form" action="javascript:void(0)" enctype="multipart/form-data"
                            class="form-validate is-alter">
                            <input type="hidden" name="_method" value="PUT">
                            @yield('form')
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary" id="btnSave">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text">ASLABTIF</span>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @isset($import)
        <div class="modal fade" id="modalImport">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalImportHeading">Modal Title</h5>
                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <em class="icon ni ni-cross"></em>
                        </a>
                    </div>
                    <div class="modal-body">
                        <form id="importForm" action="javascript:void(0)" enctype="multipart/form-data"
                            class="form-validate is-alter">
                            <div class="form-group">
                                <x-input-label for="file" :value="__('File')" />
                                <x-input-file id="file" type="file" name="file" :value="__('Choose file')" />
                                <x-input-error class="file_error" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary" id="btnImportSave">
                                    <span class="indicator-label">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light">
                        <span class="sub-text">ASLABTIF</span>
                    </div>
                </div>
            </div>
        </div>
        @endisset


        <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>

        <script type="text/javascript">
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                },
                buttonsStyling: !1,
            });
            @if (session('error'))
                swalWithBootstrapButtons.fire({
                title: 'Error!',
                html: "{{ session('error') }}",
                icon: 'error',
                timer: 3000
                })
            @elseif (session('success'))
                swalWithBootstrapButtons.fire({
                title: 'Success!',
                html: "{{ session('success') }}",
                icon: 'success',
                timer: 3000
                })
            @elseif (session('status'))
                swalWithBootstrapButtons.fire({
                title: 'Success!',
                html: "{{ session('status') }}",
                icon: 'success',
                timer: 3000
                })
            @endif
            $("#logout").on("click", function(e) {
                e.preventDefault();
                swalWithBootstrapButtons.fire({
                    title: 'Anda yakin ingin logout?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value) {
                        $('#logout-form').submit();
                    }
                });
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @isset($dataTable)
        <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.2.3') }}"></script>
        @yield('dataTable')
        <script type="text/javascript">
            let dataTable;
            $(document).ready(function() {
                let methodType = '';
                let urlUpdate = '';
                NioApp.DataTable("#dataTable", {
                    responsive: {
                        details: true,
                    },
                    processing: true,
                    serverSide: true,
                    ajax: url,
                    columns: dataColumn,
                    createdRow: function (row, data, index) {
                    $('td', row).each(function (i) {
                        $(this).addClass('nk-tb-col');
                    });
                },
                });
                @isset($create)
                    $('#btnCreate').click(function() {
                        clearModal('Tambah', 'POST');
                        forms.forEach(e => {
                            let data = e.split(":");
                            if(data[0] == 'relation'){
                                $('#' + data[1]).val('');
                            } else{
                                $('#' + e).val('');
                            }
                        });

                        @yield('customCreate')
                    });
                @endisset

                @isset($edit)
                    $('body').on('click', '.btnEdit', function() {
                        clearModal('Ubah', 'PUT');
                        let id = $(this).data('id');
                        urlUpdate = url + '/' + id;
                        $.get(url + '/' + id, function(res) {
                            @yield('customBeginEdit')
                            forms.forEach(e => {
                                let data = e.split(":");
                                if(data[0] == 'relation'){
                                    if($('#' + data[1]).prop('tagName').toLowerCase() === 'select'){
                                        $('#' + data[1]).val(res.data[relationName][data[1]]).trigger('change');
                                    } else {
                                        $('#' + data[1]).val(res.data[relationName][data[1]]);
                                    }
                                    @yield('customEditRelation')
                                } else{
                                    if($('#' + e).prop('tagName').toLowerCase() === 'select'){
                                        $('#' + e).val(res.data[e]).trigger('change');
                                    } else if($('#' + e).attr('type') != 'file'){
                                        $('#' + e).val(res.data[e]);
                                    }
                                    @yield('customEdit')
                                }
                            });
                            @yield('customEndEdit')
                        })
                    });
                @endisset

                @if (isset($create) || isset($edit))
                    function clearModal(title, type){
                        methodType = type;
                        if ( $("input").hasClass("image-file") ) {
                            $('#preview-image').attr('src', "assets/img/preview.png");
                        }
                        $("input[name='_method']").val(methodType);
                        $('.was-validated').text('').removeClass('was-validated');
                        $('.error').removeClass('error');
                        $('#btnSave').val('Submit');
                        $('#form').trigger('reset');
                        $('#modalHeading').html(title + ' ' + modalTitle);

                        @yield('clearModal')

                        @php $dataRequired = getDataRequired() @endphp
                        @if($dataRequired['required'] === true)
                            let message = '';
                            @foreach ($dataRequired['message'] as $key=> $item)
                                @if($loop->last)
                                    message += '{{ $item }}';
                                @else
                                    message += '{{ $item }}' + ', ';
                                @endif
                            @endforeach
                            swalWithBootstrapButtons.fire(
                                'Error!',
                                'Data ' + message + ' harus diisi',
                                'error'
                                );
                        @else
                            $('#modalForm').modal('show');
                        @endif
                    }

                    $('.image-file').change(function(){
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            $('#preview-image').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    });

                    $('#btnSave').on('click', (function(e) {
                        e.preventDefault();
                        if (methodType == 'POST') {
                            urlSave = url;
                        } else if (methodType == 'PUT') {
                            urlSave = urlUpdate;
                        }
                        $('#btnSave').text('Sending..', true);
                        let form = $('#form')[0];

                        $.ajax({
                            data: new FormData(form),
                            url: urlSave,
                            type: 'POST',
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function() {
                                $(document).find('div.error_text').text('');
                                $('.error').removeClass('error');
                            },
                            success: function(res) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    res.message,
                                    'success'
                                )
                                $('#form').trigger("reset");
                                $('#modalForm').modal('hide');
                                $("#dataTable").DataTable().ajax.reload();
                                $('#btnSave').html('Save Changes');
                            },
                            error: function(res) {
                                if (res.status == 400) {
                                    $.each(res.responseJSON.errors, function(prefix, val) {
                                        let error = $('div.' + prefix + '_error');
                                        let input = $('#' + prefix);
                                        error.text(val[0])
                                        error.addClass('was-validated');
                                        input.addClass('error');
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire(
                                        'Error!',
                                        res.responseJSON.message,
                                        'error'
                                    )
                                }
                                $('#btnSave').html('Save Changes');
                            }
                        });
                    }));
                @endif

                @isset($delete)
                    $('body').on('click', '.btnDelete', function() {
                        let id = $(this).data("id");
                        deleteAjax(url + "/" + id);
                    });
                    $('body').on('click', '#btnDeleteAll', function() {
                        deleteAjax(url + "/delete/all");
                    });

                    function deleteAjax(urlDelete) {
                        swalWithBootstrapButtons.fire({
                            title: 'Apa kamu yakin?',
                            text: "Anda tidak akan dapat mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Tidak, batalkan!',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "DELETE",
                                    url: urlDelete,
                                    success: function(res) {
                                        swalWithBootstrapButtons.fire(
                                            'Success!',
                                            res.message,
                                            'success'
                                        )
                                        $("#dataTable").DataTable().ajax.reload();
                                    },
                                    error: function(res) {
                                        swalWithBootstrapButtons.fire(
                                            'Error!',
                                            res.responseJSON.message,
                                            'error'
                                        )
                                    }
                                });
                            } else if (
                                result.dismiss === Swal.DismissReason.cancel
                            ) {
                                swalWithBootstrapButtons.fire(
                                    'Dibatalkan',
                                    'Datamu aman :)',
                                    'error'
                                )
                            }
                        });
                    }
                @endisset

                @isset($status)
                    $('body').on('change', '.toggle-class', function() {
                        let status = $(this).prop('checked') == true ? 1 : 0;
                        let user_id = $(this).data('id');
                        $.ajax({
                            type: "PUT",
                            dataType: "json",
                            url: url + '/status',
                            data: {
                                'status': status,
                                'id': user_id
                            },
                            success: function(res) {
                                swalWithBootstrapButtons.fire(
                                    'Success!',
                                    res.message,
                                    'success'
                                )
                            },
                            error: function(res) {
                                swalWithBootstrapButtons.fire(
                                    'Error!',
                                    res.responseJSON.message,
                                    'error'
                                )
                            }
                        });
                    });
                @endisset
            });
        </script>
        @endisset
    </body>

</html>
@php
$jabatan = [
'BENDAHARA',
'KOORDINATOR LAB',
'KOOORDINATOR TEKNIS',
'WAKIL KOORDINATOR TEKNIS',
'PJ DASAR',
'PJ JARKOM',
'PJ MULTI',
'SEKRETARIS',
'ANGGOTA'
];

$hari = [
'SENIN',
'SELESA',
'RABU',
'KAMIS',
'JUMAT',
'SABTU'
];

$asisten = getAllAsisten();
if($asisten->isEmpty()) setDataRequired(true, 'Asisten');

$kelas = getAllKelas();
if($kelas->isEmpty()) setDataRequired(true, 'Kelas');

$mata_praktikum = getAllMataPraktikum();
if($mata_praktikum->isEmpty()) setDataRequired(true, 'Mata Praktikum');

$ruangan = getAllRuangan();
if($ruangan->isEmpty()) setDataRequired(true, 'Ruangan');

@endphp
<div class="form-group">
    <x-input-label for="kelas_id" :value="__('Kelas')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="kelas_id"
        name="kelas_id">
        <option value="">Pilih Kelas</option>
        @foreach ($kelas as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="kelas_id_error" />
</div>
<div class="form-group">
    <x-input-label for="mata_praktikum_id" :value="__('Mata Praktikum')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2"
        id="mata_praktikum_id" name="mata_praktikum_id">
        <option value="">Pilih Mata Praktikum</option>
        @foreach ($mata_praktikum as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="mata_praktikum_id_error" />
</div>
<div class="form-group">
    <x-input-label for="ruangan_id" :value="__('Ruangan')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="ruangan_id"
        name="ruangan_id">
        <option value="">Pilih Ruangan</option>
        @foreach ($ruangan as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="ruangan_id_error" />
</div>
<div class="form-group">
    <x-input-label for="asisten_1_id" :value="__('Asisten 1')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="asisten_1_id"
        name="asisten_1_id">
        <option value="">Pilih Asisten 1</option>
        @foreach ($asisten as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="asisten_1_id_error" />
</div>
<div class="form-group">
    <x-input-label for="asisten_2_id" :value="__('Asisten 2')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="asisten_2_id"
        name="asisten_2_id">
        <option value="">Pilih Asisten 2</option>
        @foreach ($asisten as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="asisten_2_id_error" />
</div>
<div class="form-group">
    <x-input-label for="hari" :value="__('Hari')" />
    <div class="form-control-select">
        <x-input-select id="hari" name="hari">
            <option value="">Pilih Hari</option>
            @foreach ($hari as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </x-input-select>
    </div>
    <x-input-error class="hari_error" />
</div>
<div class="form-group">
    <x-input-label for="jam_mulai" :value="__('Jam Mulai')" />
    <x-input-text id="jam_mulai" type="time" name="jam_mulai" />
    <x-input-error class="jam_mulai_error" />
</div>
<div class="form-group">
    <x-input-label for="jam_berakhir" :value="__('Jam Berakhir')" />
    <x-input-text id="jam_berakhir" type="time" name="jam_berakhir" />
    <x-input-error class="jam_berakhir_error" />
</div>
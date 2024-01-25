@php
$jurusan = getAllJurusan();
if($jurusan->isEmpty()) setDataRequired(true, 'jurusan');
@endphp
<div class="form-group">
    <x-input-label for="nama" :value="__('Nama')" />
    <x-input-text id="nama" type="text" name="nama" placeholder="Masukkan nama kelas" autocomplete="nama" />
    <x-input-error class="nama_error" />
</div>
<div class="form-group">
    <x-input-label for="tingkat" :value="__('Tingkat')" />
    <x-input-text id="tingkat" type="number" name="tingkat" placeholder="Masukkan tingkat kelas"
        autocomplete="tingkat" />
    <x-input-error class="tingkat_error" />
</div>
<div class="form-group">
    <x-input-label for="tahun" :value="__('Tahun')" />
    <x-input-text class="year-picker" id="tahun" type="text" name="tahun">
        <div class="form-icon form-icon-right lg">
            <em class="icon ni ni-calendar-alt"></em>
        </div>
    </x-input-text>
    <x-input-error class="tahun_error" />
</div>
<div class="form-group">
    <x-input-label for="jurusan_id" :value="__('Jurusan')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="jurusan_id"
        name="jurusan_id">
        <option value="">Pilih Jurusan</option>
        @foreach ($jurusan as $item)
        <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="jurusan_id_error" />
</div>
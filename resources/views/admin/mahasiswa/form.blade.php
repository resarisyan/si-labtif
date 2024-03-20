@php
$kelas = getAllKelas();
if($kelas->isEmpty()) setDataRequired(true, 'kelas');
@endphp
<div class="form-group">
    <x-input-label for="name" :value="__('Name')" />
    <x-input-text id="name" type="text" name="name" placeholder="Masukkan nama mahasiswa" autocomplete="name" />
    <x-input-error class="name_error" />
</div>
<div class="form-group">
    <x-input-label for="npm" :value="__('NPM')" />
    <x-input-text id="npm" type="number" name="npm" placeholder="Masukkan NPM mahasiswa" autocomplete="npm"
        max="9999999999" />
    <x-input-error class="npm_error" />
</div>
<div class="form-group">
    <x-input-label for="kelas_id" :value="__('Kelas')" />
    <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="kelas_id"
        name="kelas_id">
        <option value="">Pilih kelas_id</option>
        @foreach ($kelas as $item)
        <option value="{{ $item->id }}">{{$item->jurusan->nama . ' '. $item->nama . ' ' .
            $item->tahun}}</option>
        @endforeach
    </x-input-select>
    <x-input-error class="kelas_id_error" />
</div>
<div class="form-group">
    <x-input-label for="image" :value="__('Image')" />
    <x-input-file id="image" name="image" :value="__('375 x 400')" />
    <x-input-error class="image_error" />
</div>
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
@endphp
<div class="asisten_create">
    <div class="form-group">
        <x-input-label for="user_id" :value="__('Mahasiswa')" />
        <x-input-select data-dropdown-parent="#modalForm" data-search="on" class="form-select js-select2" id="user_id"
            name="user_id">
            <option value="">Pilih Mahasiswa</option>
        </x-input-select>
        <x-input-error class="_error" />
    </div>
</div>
<div class="asisten_edit">
    <div class="form-group">
        <x-input-label for="name" :value="__('Name')" />
        <x-input-text id="name" type="text" name="name" placeholder="Masukkan nama asisten" autocomplete="name" />
        <x-input-error class="name_error" />
    </div>
    <div class="form-group">
        <x-input-label for="email" :value="__('Email')" />
        <x-input-text id="email" type="email" name="email" placeholder="Masukkan email asisten" autocomplete="email" />
        <x-input-error class="email_error" />
    </div>
    <div class="form-group">
        <x-input-label for="username" :value="__('Username')" />
        <x-input-text id="username" type="text" name="username" placeholder="Masukkan username asisten"
            autocomplete="username" />
        <x-input-error class="username_error" />
    </div>
    <div class="form-group">
        <x-input-label for="password" :value="__('Password')" />
        <x-input-text id="password" type="password" name="password" placeholder="Enter your password">
            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
            </a>
        </x-input-text>
        <x-input-error class="password_error" />
    </div>
</div>
<div class="form-group">
    <x-input-label for="jabatan" :value="__('Jabatan')" />
    <div class="form-control-select">
        <x-input-select id="jabatan" name="jabatan">
            <option value="">Pilih Jabatan</option>
            @foreach ($jabatan as $item)
            <option value="{{ $item }}">{{ $item }}</option>
            @endforeach
        </x-input-select>
    </div>
    <x-input-error class="jabatan_error" />
</div>
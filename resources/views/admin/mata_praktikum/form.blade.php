<div class="form-group">
    <x-input-label for="nama" :value="__('Nama')" />
    <x-input-text id="nama" type="text" name="nama" placeholder="Masukkan nama mata praktikum" autocomplete="nama" />
    <x-input-error class="nama_error" />
</div>
<div class="form-group">
    <x-input-label for="image" :value="__('Image')" />
    <x-input-file id="image" name="image" :value="__('410 x 270')" />
    <x-input-error class="image_error" />
</div>

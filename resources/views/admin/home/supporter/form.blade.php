<div class="form-group">
    <x-input-label for="name" :value="__('Nama')" />
    <x-input-text id="name" type="text" name="name" placeholder="Masukkan nama supporter" autocomplete="name" />
    <x-input-error class="name_error" />
</div>
<div class="form-group">
    <x-input-label for="image" :value="__('Image')" />
    <x-input-file id="image" name="image" :value="__('130 x 35')" />
    <x-input-error class="image_error" />
</div>
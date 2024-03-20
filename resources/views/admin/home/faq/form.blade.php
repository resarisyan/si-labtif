<div class="form-group">
    <x-input-label for="question" :value="__('Question')" />
    <x-input-text id="question" type="text" name="question" placeholder="Masukkan question faq"
        autocomplete="question" />
    <x-input-error class="question_error" />
</div>
<div class="form-group">
    <x-input-label for="answer" :value="__('Answer')" />
    <x-input-text id="answer" type="text" name="answer" placeholder="Masukkan answer faq" autocomplete="answer" />
    <x-input-error class="answer_error" />
</div>
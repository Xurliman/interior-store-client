<button
    x-data="{openSavedModal:false}"
    x-on:click="$dispatch('open-saved-modal', {openSavedModal: !openSavedModal})"
    type="submit"
    class="options__btn options-btn-save position-relative"
    data-tip="save">
    <img data-tip="save" class="options__btn-img" src="{{ asset('img/icons/Heart.svg') }}"
         alt="Save" />

    <!-- Tip Save -->
    <div data-tip="save" class="options__tip tip-save">
        <span>Save</span>
    </div>
</button>

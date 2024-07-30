<div>
    <button class="options__btn options-btn-download position-relative" data-tip="download">
        <img data-tip="download" src="{{ asset('img/icons/Download.svg') }}" alt="Download" />

        <!-- Tip Download -->
        <div data-tip="download" class="options__tip tip-download">
            <span>Download</span>
        </div>
    </button>

    <!-- Download Modal -->
    <div class="download-blackout" data-modal="download"></div>
    <div class="download-modal">
        <button
            x-on:click=""
            class="download-modal__btn download-modal-png me-auto">
            PNG
        </button>
        <button class="download-modal__btn download-modal-jpg me-auto">
            PDF
        </button>
    </div>
</div>

<div x-data="{ openModal:false }">
    <button
        x-on:click="$data.openModal = !openModal; $dispatch('open-modal', { openModal:openModal });"
        class="options__btn options-btn-download position-relative"
        data-tip="download">
        <img data-tip="download" src="{{ asset('img/icons/Download.svg') }}" alt="Download" />

        <!-- Tip Download -->
        <div data-tip="download" class="options__tip tip-download">
            <span>Download</span>
        </div>
    </button>
    <div
        x-data="{ openModal:false }"
        @open-modal.window="openModal = $event.detail.openModal"
        :class="{ 'active' : openModal }"
        class="download-modal">
        @auth
            <button
                x-on:click="$wire.downloadPng()"
                class="download-modal__btn download-modal-png me-auto">
                PNG
            </button>
            <form action="{{ route('pdf-download') }}" method="POST" target="_blank">
                @csrf
                <input type="hidden" name="view_id" value="{{ $viewId }}">
                <input type="hidden" name="products" value="{{ json_encode($selectedProducts) }}">
                <button
                    type="submit"
                    class="download-modal__btn download-modal-png me-auto">
                    PDF
                </button>
            </form>
        @endauth
        @guest
            <button class="download-modal__btn download-modal-jpg me-auto">
                <a class="drop-down__link" href="{{ route('register') }}">
                    Register
                </a>
            </button>
            <button class="download-modal__btn download-modal-jpg me-auto">
                <a class="drop-down__link" href="{{ route('login') }}">
                    Login
                </a>
            </button>
        @endguest
    </div>
</div>

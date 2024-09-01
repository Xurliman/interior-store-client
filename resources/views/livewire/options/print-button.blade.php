<div>
    @auth
        <form action="{{ route('print') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="view_id" value="{{ $viewId }}">
            <input type="hidden" name="products" value="{{ json_encode($selectedProducts) }}">
            <button
                type="submit"
                class="options__btn options-btn-print position-relative"
                data-tip="print">
                <img data-tip="print" src="{{ asset('img/icons/Printer.svg') }}" alt="Print" />
                <div data-tip="print" class="options__tip tip-print">
                    <span>Print</span>
                </div>
            </button>
        </form>
    @endauth
    @guest
        <div x-data="{ openModal:false }">
            <button
                x-on:click="$data.openModal = !openModal; $dispatch('open-print-modal', { openModal:openModal })"
                class="options__btn options-btn-download position-relative"
                data-tip="print">
                <img data-tip="print" src="{{ asset('img/icons/Printer.svg') }}" alt="Print" />

                <!-- Tip Download -->
                <div data-tip="print" class="options__tip tip-print">
                    <span>Print</span>
                </div>
            </button>
            <div
                x-data="{ openModal:false }"
                @open-print-modal.window="openModal = $event.detail.openModal"
                :class="{ 'active' : openModal }"
                class="print-modal">
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
            </div>
        </div>
    @endguest
</div>

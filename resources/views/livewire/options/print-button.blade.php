<button
    x-on:click="$wire.print()"
    class="options__btn options-btn-print position-relative"
    data-tip="print">
    <img data-tip="print" src="{{ asset('img/icons/Printer.svg') }}" alt="Print" />

    <!-- Tip Print -->
    <div data-tip="print" class="options__tip tip-print">
        <span>Print</span>
    </div>
</button>

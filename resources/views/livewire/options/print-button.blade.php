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

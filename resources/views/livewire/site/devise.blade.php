<div class="header-curr">
    <i class="fas fa-money-bill"></i>
    <select class="header-select custom-select" wire:model="currency" method="post" wire:change="handleCurrency">
        <option class="clr">Dévise</option>
        @foreach($currencies as $currency)
            <option class="clr"  value="{{ $currency->id }}" selected>{{ $currency->code }} {{ $currency->symbol }}</option>
        @endforeach
    </select>
</div>
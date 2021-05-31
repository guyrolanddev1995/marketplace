<div class="col-lg-8 px-3">
    <div class="row checkout-form bg-white shadow-sm" style="padding: 20px 0; ">
        <div class="col-lg-12">
            <div class="check-form-title">
                <h3>Adresse de livraison</h3>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input wire:model="nom" type="text" class="form-control  @error('nom') is-invalid @enderror"  disabled>
                @error('nom')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input wire:model="prenom" type="text" class="form-control  @error('prenom') is-invalid @enderror"  disabled>
                @error('prenom')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input wire:model="adresse" type="text" class="form-control  @error('adresse') is-invalid @enderror" placeholder="Adresse">
                @error('adresse')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">   
                <select wire:change="handleCountry()" wire:model="countryId" class="form-control  @error('countryId') is-invalid @enderror" placeholder="Pays">
                    <option value="">Sélectionner votre pays</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                    @endforeach
                </select>
                @error('countryId')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" wire:model="code_postal"  class="form-control  @error('code_postal') is-invalid @enderror" placeholder="Code postal">
                @error('code_postal')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input wire:model="ville" type="text" class="form-control  @error('ville') is-invalid @enderror" placeholder="Ville">
                @error('ville')
                     <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-3 col-md-2">
                    <input wire:model="phoneCode" type="text" class="form-control" placeholder="code" disabled>
                </div>
                <div class="col-12 col-md-10 mt-3 mt-md-0">
                    <div class="form-group">
                        <input wire:model="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" placeholder="Numero de téléphone">
                        @error('phone')
                             <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($transporteurs) > 0)
    <div class="row checkout-form mt-3 bg-white shadow-sm" style="padding: 20px 0; ">
        <div class="col-lg-12">
            <div class="check-form-title">
                <h3>Mode de livraison</h3>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="cart-list">
                <table class="table-list">
                    <thead>
                        <tr>
                            <th scope="col">Transporteur</th>
                            <th scope="col">Frais de livraison/Kilo</th>
                            <th scope="col">Délai de livraison</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transporteurs as $transporteur)
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input wire:change="selectOption({{ $transporteur }})" class="form-check-input" type="radio" name="option" wire:model="transporteur_id" value="{{ $transporteur->id }}">
                                        <label class="ml-3" for="option[{{ $transporteur->id }}]">
                                            {{ $transporteur->nom }}
                                        </label>
                                    </div>
                                </th>
                                <td>{{ currency($transporteur->frais, 'XOF', currency()->getUserCurrency()) }} </td>
                                <td>{{ $transporteur->delais }} jours</td>
                            </tr>
                        @endforeach

                        @error('transporteur')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
  
    <div class="row mt-3">
       <div class="d-flex w-100">
            <button wire:click.prevent="save" wire:loading.remove class="btn btn-inline mr-auto">
                <i class="fas fa-check"></i>
                <span>Confirmation de la commande</span>
            </button>

            <div wire:loading  wire:target="save">
                Traitement en cour...
            </div>
       </div>
    </div>
</div>
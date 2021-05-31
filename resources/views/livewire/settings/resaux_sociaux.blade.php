<div style="margin-top: 20px">
    @include('backend.partials.flash')
    <div class="form-group @error('site_name') has-error @enderror">
        <label for="site_name">Nom du site</label>
        <input type="text" wire:model="site_name" class="form-control" id="site_name" value="{{ config('settings.site_name') }}" placeholder="Entrer le nom du site">
        @error('site_name') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('site_title') has-error @enderror">
        <label for="site_title">Titre du site</label>
        <input type="text" wire:model="site_title" class="form-control" id="site_title" value="{{ config('settings.site_title') }}" placeholder="Entrer le titre du site">
        @error('site_title') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('email1') has-error @enderror">
        <label for="email1">Adresse Email 1</label>
        <input type="text" wire:model="email1" class="form-control" id="email1" value="{{ config('settings.email1') }}" placeholder="Entrer une première adresse email">
        @error('email1') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('email2') has-error @enderror">
        <label for="email2">Adresse Email 2</label>
        <input type="text" wire:model="email2" class="form-control" id="email2" value="{{ config('settings.email2') }}" placeholder="Entrer une deuxième adresse email">
        @error('email2') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('phone1') has-error @enderror">
        <label for="phone1">Téléphone 1</label>
        <input type="text" wire:model="phone1" class="form-control" id="phone1" value="{{ config('settings.phone1') }}" placeholder="Entrer un numero de téléphone">
        @error('phone1') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('name') has-error @enderror">
        <label for="name">Téléphone 2</label>
        <input type="text" wire:model="phone2" class="form-control" id="name" value="{{ config('settings.phone2') }}" placeholder="Entrer un deuxieme numero">
        @error('name') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group @error('phone3') has-error @enderror">
        <label for="phone3">Téléphone 3</label>
        <input type="text" wire:model="phone3" class="form-control" id="phone3" value="{{ config('settings.phone3') }}" placeholder="Entrer une troisième adresse numéro">
        @error('phone3') 
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $message }}
            </label>
        @enderror
    </div>

    <div class="form-group" style="padding:5px 0 20px 0">
        <button wire:click.prevent="save()" type="submit" class="btn btn-primary pull-right">Mettre à jour</button>
    </div>
</div>

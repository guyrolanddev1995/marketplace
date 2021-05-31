<div>
    <div style="margin-top: 20px">
        @include('backend.partials.flash')
        <div class="form-group @error('social_facebook') has-error @enderror">
            <label for="social_facebook">Facebook</label>
            <input type="text" wire:model="social_facebook" class="form-control" id="social_facebook" value="{{ config('settings.social_facebook') }}" placeholder="Entrer le lien de votre page Facebook">
            @error('social_facebook') 
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                    {{ $message }}
                </label>
            @enderror
        </div>
    
        <div class="form-group @error('social_twitter') has-error @enderror">
            <label for="social_twitter">Twitter</label>
            <input type="text" wire:model="social_twitter" class="form-control" id="social_twitter" value="{{ config('settings.social_twitter') }}" placeholder="Entrer le lien de votre page Twitter">
            @error('social_twitter') 
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                    {{ $message }}
                </label>
            @enderror
        </div>

        <div class="form-group @error('social_instagram') has-error @enderror">
            <label for="social_instagram">Instagram</label>
            <input type="text" wire:model="social_instagram" class="form-control" id="social_instagram" value="{{ config('settings.social_instagram') }}" placeholder="Entrer le lien de votre page Instagram">
            @error('social_instagram') 
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                    {{ $message }}
                </label>
            @enderror
        </div>

        <div class="form-group @error('social_linkedin') has-error @enderror">
            <label for="social_linkedin">Linkedin</label>
            <input type="text" wire:model="social_linkedin" class="form-control" id="social_linkedin" value="{{ config('settings.social_linkedin') }}" placeholder="Entrer le lien de votre page Linkedin">
            @error('social_linkedin') 
                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                    {{ $message }}
                </label>
            @enderror
        </div>
    
        <div class="form-group" style="padding:5px 0 20px 0">
            <button wire:click.prevent="save()" type="submit" class="btn btn-primary pull-right">Mettre à jour</button>
        </div>
    </div>
    
</div>

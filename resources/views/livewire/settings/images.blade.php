<div>
    @include('backend.partials.flash')
    <form enctype="multipart/form-data">
        <div class="box-body">
           <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        @if ($siteImage != null)
                            <img src="{{ asset('storage/'.$siteImage) }}" id="logoImg" style="width: 200px; height: 150px;">
                        @else
                            <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg" style="width: 200px; height: 150px;">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="form-group @error('logoFile') has-error @enderror">
                            <label class="control-label">Importer le logo du site</label>
                            <input class="form-control" type="file" wire:model="logoFile" onchange="loadFile(event,'logoImg')"/>
                            @error('logoFile') 
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                    {{ $message }}
                                </label>
                            @enderror

                            <div style="margin-top: 15px">
                                <button type="submit" wire:click.prevent='uploadLogo()' class="btn btn-primary pull-right">
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                    Importer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    
           <div class="form-group" style="margin-top: 20px">
            <div class="row">
                <div class="col-md-3">
                    @if ($favicon != null)
                        <img src="{{ asset('storage/'. $favicon) }}" id="logoImg" style="width: 200px; height: 150px;">
                    @else
                        <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg" style="width: 200px; height: 150px;">
                    @endif
                </div>
                <div class="col-md-9">
                    <div class="form-group @error('iconFile') has-error @enderror">
                        <label for="iconFile">Importer la favicon du site</label>
                        <input class="form-control" type="file" wire:model="iconFile" />
                        @error('iconFile') 
                            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                {{ $message }}
                            </label>
                        @enderror

                        <div style="margin-top: 15px">
                            <button type="submit" wire:click.prevent='uploadFavicon()' class="btn btn-primary pull-right">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Importer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </form>
</div>

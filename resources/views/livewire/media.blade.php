<div>
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Nouvelle image</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
             <div class="col-md-12">
                @include('backend.partials.flash')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group @error('image') has-error @enderror">
                                <label class="control-label">Importer des images dans le slide</label>
                                <input class="form-control" type="file" wire:model="image" onchange="loadFile(event,'image')"/>
                                @error('image') 
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                        {{ $message }}
                                    </label>
                                @enderror
    
                                <div style="margin-top: 15px">
                                    <button type="submit" wire:click.prevent='save()' class="btn btn-primary pull-right">
                                        <i class="fa fa-upload" aria-hidden="true"></i>
                                        Importer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
          </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Media</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                @if(count($images) > 0)
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 400px">
                    <ol class="carousel-indicators">
                      @foreach($images as $key => $image)
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                      @endforeach
                    </ol>
                    <div class="carousel-inner">
                      @foreach ($images as $image)
                        <div class="item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$image->media) }}" style="width: 100%; height:400px" alt="First slide">
                        </div>
                      @endforeach
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                </div>
                @endif
            </div>

            <div class="col-md-12" style="margin-top: 40px">
                @foreach($images as $image)
                    <div class="col-md-3" style="margin: 20px 0px">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('storage/'.$image->media) }}" id="brandLogo" class="img-fluid" alt="img" width="100%" height="170px">
                                <a class="card-link float-right text-danger" wire:click.prevent="remove({{ $image->id }})" href="#">
                                    <i class="fa fa-fw fa-lg fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
    </div>
</div>


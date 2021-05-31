@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
        Modification de #{{ $famille->name }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
      <li class="active">{{ $famille->name }}</li>
    </ol>
</section>

  <!-- Main content -->
<section class="content container-fluid" style="margin-top:30px">
    @include('backend.partials.flash')
    <div class="row mt-4">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Modification de #{{ $famille->name }}</h3>
            </div>
           
            <form role="form" method="post" action="{{ route('admin.famille.update', $famille->slug) }}"  enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="box-body">
                
                <div class="form-group @error('name') has-error @enderror">
                  <label for="nom">Nom</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $famille->name) }}" placeholder="Entrer le nom de la catégorie">
                  @error('name') 
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                        {{ $message }}
                    </label>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea rows="5" class="form-control" name="description">{{ old('description', $famille->description) }}</textarea>
                </div>

                <div class="form-group" style="margin: 50px 0px">
                    <div class="row">
                        <div class="col-12 col-md-4">
                          @if ($famille->image != null)
                              <img src="{{ asset('storage/'.$famille->image) }}" id="imagePreview" style="width: 250px; height: 200px;">
                          @else
                              <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="imagePreview" style="width: 250px; height: 200px;">
                          @endif
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group @error('image') has-error @enderror">
                                <label class="control-label">Selectionner l'image de banniere</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="loadFile(event,'imagePreview')"/>
                                @error('image') 
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" {{ $famille->status ? 'checked' : '' }}> Mettre en ligne
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
              </div>
            </form>
          </div>
          <!-- /.box -->    
        </div>
      </div>
</section>
@endsection
@section('scripts')
<script>
    loadFile = function(event, id) {
        var output = document.getElementById(id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection
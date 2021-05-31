@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
       Nouvelle Famille
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
      <li class="active">nouvelle famille</li>
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
              <h3 class="box-title">Créer une nouvelle famille</h3>
            </div>
           
            <form role="form" method="POST" action="{{ route('admin.famille.store') }}"  enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group @error('name') has-error @enderror">
                  <label for="name">Nom</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom de la famille">
                  @error('name') 
                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                          {{ $message }}
                      </label>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea rows="5" class="form-control" name="description"></textarea>
                </div>

                <div class="form-group" style="margin: 50px 0px">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="https://via.placeholder.com/100x100?text=Placeholder+Image" id="category_preview" style="width:250px; height: 200px;">
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group @error('image') has-error @enderror">
                                <label class="control-label">Selectionner l'image de banniere</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="loadFile(event,'category_preview')"/>
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
                    <input type="checkbox" name="status"> Mettre en ligne
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregister</button>
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
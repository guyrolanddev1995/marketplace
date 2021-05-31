@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
       Nouvelle categorie
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
      <li class="active">nouvelle catégorie</li>
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
              <h3 class="box-title">Créer une nouvelle catégorie</h3>
            </div>
           
            <form role="form" method="post" action="{{ route('admin.category.store') }}">
              @csrf
              <div class="box-body">
                <div class="form-group @error('parent_id') has-error @enderror">
                    <label>Catégorie parente</label>
                    <select name="parent_id" class="form-control">
                      <option value="">Sélectionner la famille de la catégorie</option>
                      @foreach($familles as $famille)
                        <option value="{{ $famille->id }}">{{ $famille->name }}</option>
                      @endforeach
                    </select>
                    @error('parent_id') 
                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                          {{ $message }}
                      </label>
                    @enderror
                  </div>
                <div class="form-group @error('name') has-error @enderror">
                  <label for="name">Nom</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom de la catégorie">
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
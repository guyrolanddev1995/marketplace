@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
        Modification de #{{ $category->name }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
      <li class="active">{{ $category->name }}</li>
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
              <h3 class="box-title">Modification de #{{ $category->name }}</h3>
            </div>
           
            <form role="form" method="post" action="{{ route('admin.category.update', $category->slug) }}">
              @csrf
              @method('PUT')
              <div class="box-body">
                  <div class="form-group">
                    <label>Catégorie parente</label>
                    <select name="parent_id" class="form-control">
                        <option value="">Sélectionner la famille de la catégorie</option>
                        @foreach($familles as $famille)
                          <option {{ $famille->id == $category->parent_id ? 'selected' : '' }} value="{{ $famille->id }}">{{ $famille->name }}</option>
                        @endforeach
                    </select>
                    @error('parent_id') 
                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                          {{ $message }}
                      </label>
                    @enderror
                  </div>
                <div class="form-group @error('name') has-error @enderror">
                  <label for="nom">Nom</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" placeholder="Entrer le nom de la catégorie">
                  @error('name') 
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                        {{ $message }}
                    </label>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea rows="5" class="form-control" name="description" value="{{ $category->description }}"></textarea>
                </div>
               
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" {{ $category->status ? 'checked' : '' }}> Mettre en ligne
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
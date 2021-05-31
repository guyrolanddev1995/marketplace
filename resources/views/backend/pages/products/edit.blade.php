@extends('backend.layouts.app')

@section('content')

<div>
    <section class="content-header">
        <h1> 
           #{{ $product->name }}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-bookmark"></i> produits</a></li>
          <li class="active">{{ $product->name }}</li>
        </ol>
    </section>
    
      <!-- Main content -->
    <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')
        <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="{{ Route::currentRouteName() == 'admin.product.edit' ? 'active' : '' }}"><a href="{{ route('admin.product.edit', $product->slug) }}">Informations du produit </a></li>
                  <li class="{{ Route::currentRouteName() == 'admin.product.galerie' ? 'active' : '' }}"><a href="{{ route('admin.product.galerie', $product->slug) }}">Galerie photos</a></li>
                  <li class="{{ Route::currentRouteName() == 'admin.product.video' ? 'active' : '' }}"><a href="{{ route('admin.product.video', $product->slug) }}">Video</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane {{ Route::currentRouteName() == 'admin.product.edit' ? 'active' : '' }}" id="tab_1">
                    <form role="form" method="POST" action="{{ route('admin.product.update', $product->slug) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                          <div class="form-group @error('name') has-error @enderror">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name" placeholder="Entrer le nom du produit" value="{{ old('name', $product->name) }}">
                            @error('name') 
                                <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                    {{ $message }}
                                </label>
                            @enderror
                          </div>
      
                          <div class="form-group @error('sku') has-error @enderror">
                              <label for="sku">Réference </label>
                              <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror " id="sku" placeholder="Entrer la référence du produit" value="{{ old('sku', $product->sku) }}">
                              @error('sku') 
                                  <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                      {{ $message }}
                                  </label>
                              @enderror
                          </div>
      
                          <div class="form-group">
                              <label>Categorie</label>
                              <select class="form-control select2 @error('categories') is-invalid @enderror " name="category_id" data-placeholder="Séléctionner la categorie associées au produit" style="width: 100%;">
                                    @foreach($categories as $categorie)
                                        <option {{ $categorie->id == $product->category_id ? 'selected' : '' }} value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                    @endforeach
                              </select>
                          </div>
      
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group @error('price') has-error @enderror">
                                      <label for="price">Prix</label>
                                      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror " id="price" placeholder="Entrer le prix du produit" value="{{ old('price', $product->price) }}">
                                      @error('sku') 
                                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                              {{ $message }}
                                          </label>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="sale_price">Prix spécial</label>
                                      <input type="text" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" placeholder="Entrer le prix spécial du produit" value="{{ old('sale_price', $product->sale_price) }}">
                                  </div>
                              </div>
                          </div>
      
                          <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group @error('quantity') has-error @enderror">
                                      <label for="quantity">Quantité</label>
                                      <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control @error('quantity') is-invalid @enderror " id="price" placeholder="">
                                      @error('quantity') 
                                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                              {{ $message }}
                                          </label>
                                      @enderror
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="stock">Seuil de stock</label>
                                      <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="">
                                      
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group @error('min_quantity') has-error @enderror">
                                      <label for="min_quantity">Quantité minimum</label>
                                      <input type="number" name="min_quantity" value="{{ old('min_quantity', $product->min_quantity) }}" class="form-control @error('min_quantity') is-invalid @enderror" id="min_quantity" placeholder="Entrer la quantité mininale">
                                      
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group @error('poids') has-error @enderror">
                                      <label for="poids">Poids du produit(kg)</label>
                                      <input type="number" name="poids" value="{{ old('poids', $product->poids) }}" class="form-control @error('poids') is-invalid @enderror" id="poids" placeholder="Entrer le poids du produit">
                                      @error('poids') 
                                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                              {{ $message }}
                                          </label>
                                      @enderror
                                  </div>
                              </div>
                          </div>
      
                          <div class="form-group">
                              <label class="control-label" for="caracteristique">Caracteristiques du produit</label>
                              <textarea name="caracteristique" id="caracteristique" class="form-control">{!! old('caracteristique', $product->caracteristique) !!}</textarea>
                          </div>
      
                          <div class="form-group @error('image') has-error @enderror" style="margin: 50px 0px">
                              <div class="row">
                                  <div class="col-12 col-md-4">
                                      @if ($product->product_image != null)
                                          <img src="{{ asset('storage/'.$product->product_image) }}" id="imagePreview" style="width: 250px; height: 200px;">
                                      @else
                                          <img src="https://via.placeholder.com/80x80?text=Placeholder+Image" id="imagePreview" style="width: 250px; height: 200px;">
                                      @endif
                                  </div>
                                  <div class="col-12 col-md-8">
                                      <div class="form-group @error('image') has-error @enderror">
                                          <label class="control-label">Selectionner l'image de couverture du produit</label>
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
      
                          <div class="form-group">
                              <label class="control-label" for="description">Description</label>
                              <textarea name="description" id="description" rows="8" class="form-control">{!! old('description', $product->description) !!}</textarea>
                          </div>
                         
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="status" {{ $product->status == 1 ? 'checked' : '' }}> Mettre le produit en ligne
                            </label>
                          </div>
                          <div class="checkbox">
                              <label>
                                <input type="checkbox" name="is_new" {{ $product->is_new == 1 ? 'checked' : '' }}> Definir comme nouveau produit
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="featured" {{ $product->featured == 1 ? 'checked' : '' }}> Definir comme produit en vedette
                              </label>
                            </div>
                        </div>
                        <!-- /.box-body -->
          
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Mettre à jour produit</button>
                        </div>
                      </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane {{ Route::currentRouteName() == 'admin.product.galerie' ? 'active' : '' }}" id="tab_2">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" class="dropzone" id="dropzone" style="border: 2px dashed rgba(0,0,0,0.3)">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    {{ csrf_field() }}
                                </form>
                                <div style="margin-top: 20px" class="pull-right">
                                    <button class="btn btn-success" type="button" id="uploadButton">
                                        <i class="fa fa-fw fa-lg fa-upload"></i>Télécharger
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($product->images)
                        <div class="row" style="margin-top: 30px">
                                @foreach($product->images as $image)
                                    <div class="col-md-3 mb-2">
                                        <img src="{{ asset('storage/galeries/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img" style="width:200px; height:150px">
                                        <a class="card-link float-right text-danger" href="{{ route('admin.product.galerie.delete', $image) }}">
                                            <i class="fa fa-fw fa-lg fa-trash"></i>
                                        </a>
                                    </div>
                                @endforeach
                        </div>
                        @endif
                        <div class="row" style="margin-top: 50px; padding-left: 20px">
                           <div class="col-12">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-danger">
                                Retour
                            </a>
                           </div>
                        </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane {{ Route::currentRouteName() == 'admin.product.video' ? 'active' : '' }}" id="tab_3">
                      <form role="form" method="POST" action="{{ route('admin.product.videos.update', $product->slug) }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                @if($product->product_video)
                                    <video width="100%" src="{{ asset('storage/'.$product->product_video) }}" controls  id="video"></video>
                                @else
                                    <video width="100%" controls  id="video"></video>
                                @endif
                                
                            </div>
                            <div class="col-md-6">
                                <h1 class="text-lg font-semibold text-gray-800 mb-6">Video de présentation du produit </h1>
                                <p class="">
                                    Téléchargez une video de moin d'une 1min qui présente présente votre produit. Il doit répondre à nos normes de qualité de video pour être accepté. <br>
                                    Directives importantes: .mp4, Taille de la vidéo 10Mo 
                                </p>
                                <input type="file" name="video" id="video" class="form-control @error('video') is-invalid @enderror" onchange="loadFile(event,'video')">
                                @error('video') 
                                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                                        {{ $message }}
                                    </label>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <a href="{{ route('admin.product.index') }}" class="btn btn-danger">
                                    Retour
                                </a>
                                <button class="btn btn-success pull-right" type="submit">
                                    <i class="fa fa-fw fa-lg fa-upload"></i>Télécharger
                                </button>
                            </div>
                        </div>
                      </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </section>
   
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('backend/plugins/bootstrap-notify.min.js') }}"></script>
<!-- Select2 -->
<script>
    
    $('.select2').select2();

    Dropzone.autoDiscover = false;

    var urlData = '{{ route('upload-files') }}'
    tinymce.init({
                selector: 'textarea#caracteristique',
                height: 200,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime  table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor alignleft aligncenter alignright alignjustify ' +
                ' bullist numlist outdent indent | ' +
                'removeformat | fullscreen help',
                paste_data_images: true,
                automatic_uploads: true,
    });

    tinymce.init({
                selector: 'textarea#description',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime  table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor alignleft aligncenter alignright alignjustify ' +
                '| image  | ' +
                ' bullist numlist outdent indent | ' +
                'removeformat | fullscreen help',
                paste_data_images: true,
                automatic_uploads: true,
                images_upload_handler: function(blobinfo, success, failure){
                    var data = new FormData()
                    data.append('image', blobinfo.blob(), blobinfo.filename())
                    axios.post(urlData, data)
                        .then(function(resp){
                            success(resp.data.url);
                            $('form').append('<input type="hidden" name="media[]" value="'+resp.data.name+'">');
                        })
                        .catch((error) => {
                            debugger
                        } )
                }
    });

    let myDropzone = new Dropzone("#dropzone", {
                paramName: 'image',
                addRemoveLinks: false,
                maxFilesize: 4,
                parallelUploads: 8,
                uploadMultiple: false,
                url: "{{ route('admin.product.galerie.update') }}",
                autoProcessQueue: false,
            });
            myDropzone.on("queuecomplete", function (file) {
                showNotification('Completed', 'Image téléchargée(s) avec succèss', 'success', 'fa-check');
                setTimeout(() => { window.location.reload(), 1000})
            });
            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    showNotification('Error', 'Please select files to upload.', 'danger', 'fa-close');
                } else {
                    myDropzone.processQueue();
                }
        });

        function showNotification(title, message, type, icon){
            $.notify({
                title: title + ' : ',
                message: message,
                icon: 'fa ' + icon
            },{
                type: type,
                allow_dismiss: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                
             });
        }

    loadFile = function(event, id) {
        var output = document.getElementById(id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection

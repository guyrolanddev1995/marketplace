@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
       Paramètre
    </h1>
    <ol class="breadcrumb">
      <li class="active">Paramètre</li>
    </ol>
</section>

  <!-- Main content -->
<section class="content container-fluid">
 
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Paramètre du site</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Paramètre généraux</a></li>
              <li><a href="#tab_2" data-toggle="tab">Affichage</a></li>
              <li><a href="#tab_3" data-toggle="tab">Réseaux Sociaux</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                  <livewire:settings.general/>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                  <livewire:settings.images/>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                  <livewire:settings.social-link/>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
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



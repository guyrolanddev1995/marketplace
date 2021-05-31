@extends('backend.layouts.app')

@section('content')
<div>
    <section class="content-header">
        <h1>
          Les commandes
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li class="active">liste des commandes</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Toutes mes commandes</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Commandes attentes</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Commandes en cour de livraison</a></li>
                  <li><a href="#tab_4" data-toggle="tab">Commandes livrées</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @include('backend.includes.orderTable', ['orders' => $orders])
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    @include('backend.includes.orderTable', ['orders' => $en_attentes])
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    @include('backend.includes.orderTable', ['orders' => $en_cours])
                  </div>
                  <!-- /.tab-pane --> 
                  <div class="tab-pane" id="tab_4">
                    @include('backend.includes.orderTable', ['orders' => $livres])
                  </div>
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        </div>
        <!-- /.row -->
      </section>
</div>
@endsection


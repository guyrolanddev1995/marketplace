@extends('backend.layouts.app')

@section('content')
<section class="content-header">
    <h1> 
       Tableau de bord
    </h1>
    <ol class="breadcrumb">
      <li class="active">Tableau de bord</li>
    </ol>
</section>

  <!-- Main content -->
<section class="content container-fluid">
  <div class="row">
    <livewire:notifications/>
  
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    
    <livewire:order-notification/>

  </div>

  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Les dernieres commandes</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="table-responsive">
        <table class="table no-margin">
          <thead>
          <tr>
            <th width="5%">#</th>
            <th>Commande</th>
            <th>Client</th>
            <th>Produits</th>
            <th>Montant</th>
            <th>Date</th>
          </tr>
          </thead>
          <livewire:order-widget/>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-default btn-flat pull-right">Voir toutes les commandes</a>
    </div>
    <!-- /.box-footer -->
  </div>

  <div class="row">
      <div class="col-12 col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Produits récement ajoutés</h3>
        
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <livewire:product-widget/>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ route('admin.product.index') }}" class="uppercase">Voir tous les produits</a>
            </div>
            <!-- /.box-footer -->
          </div>
      </div>
  </div>

   
   

 
</section>
@endsection
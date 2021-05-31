@extends('backend.layouts.app')

@section('content')
<div>
    <section class="content-header">
        <h1>
          Les produits
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li class="active">liste des produits</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Liste des produits</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Tous les produits</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Stock épuisés</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="5%">Ref</th>
                                <th class="5%">Media</th>
                                <th class="20%">Nom</th>
                                <th>Prix(CFA)</th>
                                <th>Catégories</th>
                                <th>status</th>
                                <th>Stock</th>
                                <th>Date</th>
                                <th class="5%">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $key => $product)
                                  <tr>
                                      <td>{{ $product->sku }}</td>
                                      <td>
                                          <img src="{{ asset('storage/'.$product->product_image) }}" alt="" width="40px" height="40px">
                                      </td>
                                      <td>{{ $product->name }}</td>
                                      <td>{{ number_format($product->price, 0, '.', ' ') }}</td>
                                      <td>
                                         <span class="badge label-primary rounded">{{ $product->category->name }}</span>
                                      </td>
                                      <td>
                                          @if($product->status)
                                               <span class="badge label-success rounded">En ligne</span>
                                          @else
                                               <span class="badge label-danger rounded">hors ligne</span>
                                          @endif
                                      </td>
                                      <td>
                                          @if($product->quantity <= $product->stock)
                                              <span class="badge label-danger rounded">épuisé</span>
                                          @else
                                              <span class="badge label-info rounded">en stock</span>
                                          @endif
                                      </td>
                                      <td>{{ $product->created_at }}</td>
                                      <td>
                                          <div class="btn-group">
                                              <a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                              <a href="{{ route('admin.product.delete', $product->slug) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                          <table id="example2" class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th class="5%">Ref</th>
                                <th class="5%">Media</th>
                                <th class="20%">Nom</th>
                                <th>Prix(CFA)</th>
                                <th>Catégories</th>
                                <th>status</th>
                                <th>Stock</th>
                                <th>Date</th>
                                <th class="5%">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($stock_epuises as $key => $product)
                                  <tr>
                                      <td>{{ $product->sku }}</td>
                                      <td>
                                          <img src="{{ asset('storage/'.$product->product_image) }}" alt="" width="40px" height="40px">
                                      </td>
                                      <td>{{ $product->name }}</td>
                                      <td>{{ number_format($product->price, 0, '.', ' ') }}</td>
                                      <td>
                                         <span class="badge label-primary rounded">{{ $product->category->name }}</span>
                                      </td>
                                      <td>
                                          @if($product->status)
                                               <span class="badge label-success rounded">En ligne</span>
                                          @else
                                               <span class="badge label-danger rounded">hors ligne</span>
                                          @endif
                                      </td>
                                      <td>
                                          @if($product->quantity <= $product->stock)
                                              <span class="badge label-danger rounded">épuisé</span>
                                          @else
                                              <span class="badge label-info rounded">en stock</span>
                                          @endif
                                      </td>
                                      <td>{{ $product->created_at }}</td>
                                      <td>
                                          <div class="btn-group">
                                              <a href="{{ route('admin.product.edit', $product->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                              <a href="{{ route('admin.product.delete', $product->slug) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.tab-content -->
                    </div>
                    <!-- nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
</div>
@endsection
@section('scripts')
<script>
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    });
</script>
@endsection

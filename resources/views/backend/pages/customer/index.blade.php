@extends('backend.layouts.app')

@section('content')
<div>
    <section class="content-header">
        <h1>
          Les Clients
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li class="active">liste des Clients</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Liste des clients</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="17%">Nom</th>
                    <th width="17%">Prenom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th width="13%">Date</th>
                    <th width="8%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $customer->nom }}
                            </td>
                            <td>{{ $customer->prenom }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.customer.show', $customer) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('admin.customer.delete', $customer) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                 
                  </tbody>
                </table>
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
        'info'        : true,
        'autoWidth'   : false
    });
</script>
@endsection

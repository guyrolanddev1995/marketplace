@extends('backend.layouts.app')

@section('content')
<div>
    <section class="content-header">
        <h1>
          Les familles
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li class="active">liste des familles</li>
        </ol>
      </section>
    
      <!-- Main content -->
      <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Liste des familles</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th>Nom</th>
                    <th>description</th>
                    <th width="10%">status</th>
                    <th width="15%">Date</th>
                    <th width="10%">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($familles as $key => $famille)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $famille->name }}</td>
                            <td>{{ $famille->description }}</td>
                            <td><span class="label label-success rounded">En ligne</span></td>
                            <td>{{ $famille->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.famille.edit', $famille->slug) }}"  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('admin.famille.delete', $famille->slug) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
@endsection
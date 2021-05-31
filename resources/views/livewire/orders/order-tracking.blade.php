<div>
   @include('backend.partials.flash')
   @include('livewire.orders.create')
   <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Liste des destinations</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th width="10%">#</th>
                      <th>Destination</th>
                      <th width="25%">Status</th>
                      <th width="10%">Actions</th>
                      <th width="10%"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($trackings as $key => $traking)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $traking->location }}</td>
                                <td class="text-center">
                                    @if($traking->status == '0')
                                        <span class="badge label-danger rounded">En attente de livraison</span>
                                    @elseif($traking->status == '1')
                                        <span class="badge label-info rounded">En cour de livraison</span>
                                    @else
                                        <span class="badge label-success rounded">Terminé</span>    
                                    @endif  
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if($traking->status == '0')
                                            <button wire:click="startTracking({{ $traking->id }})"  wire:loading.attr="disabled" type="button"  class="btn btn-primary btn-sm"><i class="fa fa-play"></i> Demarrer</button>
                                        @elseif($traking->status == '1')
                                            <button wire:click="completeTracking({{ $traking->id }})"  wire:loading.attr="disabled" type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Terminer</button>
                                        @else
                                            <button class="btn btn-success btn-sm" disabled><i class="fa fa-check"></i> Terminer</button>
                                        @endif                
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button wire:click.prevent="delete({{ $traking->id }})"  wire:loading.attr="disabled" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
    </div>
</div>
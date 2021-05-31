<div class="row">
    <div class="col-xs-12">
      @include('backend.partials.flash')
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Information</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form">
                <div class="form-group @error('code') has-error @enderror">
                    <label for="code">Code de la Dévise</label>
                    <input type="text" wire:model="code" class="form-control" id="code" placeholder="ex: XOF">
                    @error('code') 
                        <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                            {{ $message }}
                        </label>
                    @enderror
                    
                </div>
                <div class="box-footer">
                      <button wire:click.prevent='save' type="submit" class="btn btn-primary"  wire:loading.attr="disabled">Enregistrer</button>
                </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Liste des dévises</h3>
            <button wire:click.prevent='reload' type="submit" class="btn btn-sm btn-success pull-right">Actualiser</button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>Code</th>
                  <th>Nom</th>
                  <th width="">Symbol</th>
                  <th width="">Format</th>
                  <th width="">Convertisseur</th>
                  <th width="">Status</th>
                  <th width="8%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($devises as $key => $devise)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $devise->code }}</td>
                            <td width="20%">{{ $devise->name }}</td>
                            <td class="">{{ $devise->symbol }}</td>
                            <td class="">{{ $devise->format }}</td>
                            <td>{{ $devise->exchange_rate }}</td>
                            <td>
                              @if($devise->active)
                                  <span class="badge label-success rounded">Activé</span>
                              @else
                                  <span class="badge label-danger rounded">Désactivé</span>
                              @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                  @if($devise->active)
                                      <button wire:click.prevent="disable({{ $devise->id }})"  wire:loading.attr="disabled" class="btn btn-warning btn-sm"><i class="fa fa-lock"></i></button>
                                  @else
                                      <button wire:click.prevent="enable({{ $devise->id }})"  wire:loading.attr="disabled" class="btn btn-success btn-sm"><i class="fa fa-unlock"></i></button>
                                  @endif
                                 
                                  <button wire:click.prevent="delete({{ $devise->id }})"  wire:loading.attr="disabled" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
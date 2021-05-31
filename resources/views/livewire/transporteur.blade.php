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
              <div class="form-group @error('nom') has-error @enderror">
                  <label for="nom">Nom du transporteur</label>
                  <input type="text" wire:model="nom" class="form-control " id="nom" placeholder="Entrer le nom du transporteur">
                  @error('nom') 
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                        {{ $message }}
                    </label>
                  @enderror
                 
              </div>
              <div class="form-group @error('description') has-error @enderror">
                    <label for="description">Description</label>
                    <textarea type="text" wire:model="description" class="form-control " id="description" placeholder="Entrer une description"></textarea>
                    @error('description') 
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                        {{ $message }}
                    </label>
                    @enderror
                
                </div>
                <div class="form-group @error('frais') has-error @enderror">
                    <label for="frais">Frais de livraison(/kg)</label>
                    <input type="text" wire:model="frais" class="form-control " id="frais" placeholder="Entrer les frais de livraison du transporteur">
                    @error('frais') 
                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                          {{ $message }}
                      </label>
                    @enderror
                   
                </div>
                <div class="form-group @error('delais') has-error @enderror">
                    <label for="delais">Delais de livraison(jours)</label>
                    <input type="text" wire:model="delais" class="form-control " id="delais" placeholder="">
                    @error('delais') 
                      <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                          {{ $message }}
                      </label>
                    @enderror
                   
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  @if($isUpdated)
                    <button wire:click.prevent='update' type="submit" class="btn btn-primary"  wire:loading.attr="disabled">Mettre à jour</button>
                    <button wire:click.prevent='cancel' type="submit" class="btn btn-danger"  wire:loading.attr="disabled">Annuler</button>
                  @else
                    <button wire:click.prevent='save' type="submit" class="btn btn-primary"  wire:loading.attr="disabled">Enregistrer</button>
                  @endif
                
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Liste des transporteurs</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="10%">#</th>
                  <th>Transporteur</th>
                  <th>Description</th>
                  <th width="">Frais de livraison(/kg)</th>
                  <th width="">delais de livraison(jours)</th>
                  <th width="">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($transporteurs as $key => $transporteur)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $transporteur->nom }}</td>
                            <td width="20%">{{ $transporteur->description }}</td>
                            <td class="">{{ $transporteur->frais }}</td>
                            <td>{{ $transporteur->delais }}</td>
                            <td>
                                <div class="btn-group">
                                    <button wire:click.prevent="edit({{ $transporteur->id }})"  wire:loading.attr="disabled" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                    <button wire:click.prevent="delete({{ $transporteur->id }})"  wire:loading.attr="disabled" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
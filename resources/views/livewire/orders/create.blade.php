<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Créer une nouvelle destination</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" wire:submit.prevent='save'>
              <div class="form-group @error('destination') has-error @enderror">
                  <label for="destination">Destination</label>
                  <input type="text" wire:model="destination" class="form-control " id="destination" placeholder="Entrer une destination">
                  @error('destination') 
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                        {{ $message }}
                    </label>
                  @enderror
                 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"  wire:loading.attr="disabled">Enregistrer</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
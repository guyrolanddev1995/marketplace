@extends('backend.layouts.app')

@section('content')
<div>
    <section class="content-header">
        <h1>
         #{{ $order->code }}
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
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Commande #{{ $order->code }}</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                    
                    <div class="col-md-7">
                      <div class="table-responsive">
                        <table class="table table-md">
                            <tr>
                                <td width="40%" style="border: none"><strong>Nom</strong>:</td>
                                <td style="border: none">{{ $order->nom }}</td>
                            </tr>
                            <tr>
                                <td width="40%" style="border: none"><strong>Prenom</strong>:</td>
                                <td style="border: none">{{ $order->prenom }}</td>
                            </tr>
                            <tr>
                                <td style="border: none" width="40%"><strong>Téléphone</strong>:</td>
                                <td style="border: none">{{ $order->phone1 }}</td>
                            </tr>
                            <tr>
                              <td style="border: none" width="40%"><strong>Adresse de livraison</strong>:</td>
                              <td style="border: none">{{ $order->adresse }}</td>
                            </tr>
                            <tr>
                                <td style="border: none" width="40%"><strong>Pays</strong>:</td>
                                <td style="border: none">{{ $order->country->nicename }}</td>
                            </tr>
                            <tr>
                                <td style="border: none" width="40%"><strong>Ville</strong>:</td>
                                <td style="border: none">{{ $order->ville }}</td>
                            </tr>
                            <tr>
                                <td style="border: none" width="40%"><strong>Code postal</strong>:</td>
                                <td style="border: none">{{ $order->code_postal }}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="table-responsive">
                        <table class="table table-md">
                            <tr>
                                <td style="border: none" width="50%"><strong>Numero de commande</strong>:</td>
                                <td style="border: none"><strong>{{ $order->code }}</strong></td>
                            </tr>
                            <tr>
                              <td style="border: none" width="50%"><strong>Date:</strong></td>
                              <td style="border: none">{{ date('d/m/Y', strtotime($order->created_at)) }} à {{ date('H:m:s', strtotime($order->created_at)) }}</td>
                            </tr>
                            <tr>
                              <td style="border: none" width="50%"><strong>Status:</strong></td>
                              <td style="border: none">
                                @if($order->status == 0)
                                    <small class="badge label-primary text-white">Commande en Attente</small></b>
                                @elseif($order->status == 1)
                                    <small class="badge label-warning text-white">En cour de livraison</small></b> 
                                @else
                                    <small class="badge label-success text-white">Commande livrée</small></b> 
                                @endif
                              </td>
                            </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                  @if($order->transporteur_id)
                    <div class="row" style="margin: 20px 0px">
                      <div class="col-xs-6" style="margin-right: auto">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <tr>
                                <th style="width:50%">Transporteur:</th>
                                <td>{{ $order->transporteur->nom }}</td>
                              </tr>
                              <tr>
                                <th>Délais de livraison:</th>
                                <td> {{ $order->transporteur->delais }} Jours</td>
                              </tr>
                              <tr>
                                <th>Frais de livraison(/kg):</th>
                                <td>{{ currency($order->transporteur->frais, 'XOF', $order->currency) }}</td>
                              </tr>
                            </table>
                          </div>
                      </div>
                    </div>
                  @endif
                <div class="row mt-4">
                  <div class="col-md-12">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover table-md">
                            <tr>
                              <th data-width="40">#</th>
                              <th>Article</th>
                              <th class="text-center">Prix unitaire</th>
                              <th class="text-center">Quantité</th>
                              <th class="text-right">Prix Total</th>
                            </tr>
            
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ currency($product->pivot->product_price, 'XOF', $order->currency) }}</td>
                                    <td class="text-center">{{ $product->pivot->quantity }}</td>
                                    <td class="text-right">{{ currency( $product->pivot->total_price, 'XOF', $order->currency) }}</td>
                                </tr>
                            @endforeach
                          </table>
                      </div>
                    </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xs-6 pull-right" style="margin-right: auto">
                      <div class="table-responsive">
                        <table class="table">
                          <tr>
                            <th style="width:50%">Sous-total:</th>
                            <td>{{ currency($order->amount, 'XOF', $order->currency) }}</td>
                          </tr>
                          @if($order->frais_livraison)
                            <tr>
                              <th>Frais de livraison:</th>
                              <td> {{ currency($order->frais_livraison, 'XOF', $order->currency) }}</td>
                            </tr>
                          @endif
                          <tr>
                            <th>Total:</th>
                            <td>{{ currency($order->amount +  $order->frais_livraison, 'XOF', $order->currency) }}</td>
                          </tr>

                          @if($order->devise)
                            <tr>
                              <th>Devise:</th>
                              <td>{{ $order->devise->label }} <strong>({{ $order->devise->code }})</strong></td>
                            </tr>
                          @endif
                         
                        </table>
                      </div>
                  </div>
                </div>
              <!-- /.box-body -->
            </div>
            <div class="box-footer">
                <div class="row no-print">
                    <div class="col-xs-12">
                      @if($order->status == 1)
                        <a href="{{ route('admin.orders.tracking', $order->code) }}" class="btn btn-danger pull-right"><i class="fa fa-plus"></i> Créer un suivi de commande</a>
                        <a href="#" class="btn btn-primary pull-right" style="margin: 0px 5px"><i class="fa fa-download"></i> Générer la facture</a>
                        <a href="{{ route('admin.orders.confirm_delivery', $order->code) }}" class="btn btn-success pull-right"><i class="fa fa-check"></i> Confirmer la livraison</a>
                      @elseif($order->status == 2)
                      <a href="#" class="btn btn-primary pull-right" style="margin: 0px 5px"><i class="fa fa-download"></i> Générer la facture</a>
                      @else
                      <a href="{{ route('admin.orders.update', $order->code) }}" class="btn btn-success pull-right"><i class="fa fa-check"></i> Confirmer la commande</a>
                      @endif
                      <a href="{{ route('admin.orders.index') }}" class="btn btn-default" style="margin-right: 5px;">
                        <i class="fa fa-arrow-left"></i> Retour
                      </a>
                    </div>
                </div>
            </div>
    
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

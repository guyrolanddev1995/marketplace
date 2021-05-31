<table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th width="5%">#</th>
      <th width="10%">Code</th>
      <th width="17%">Client</th>
      <th>Téléphone</th>
      <th>Montant</th>
      <th>Pays</th>
      <th>status</th>
      <th width="13%">Date</th>
      <th width="8%">Actions</th>
    </tr>
    </thead>
    <tbody>
      @foreach($orders as $key => $order)
          <tr>
              <td>{{ $key + 1 }}</td>
              <td>
                  <a href="#">{{ $order->code }}</a>
              </td>
              <td>{{ $order->nom }} {{ $order->prenom }}</td>
              <td>{{ $order->phone1 }}</td>
              <td>{{ number_format($order->amount, 0, '.', ' ') }} FCFA</td>
              <td>{{ $order->country->nicename }}</td>
              <td>
                  @if($order->status == 1)
                      <span class="badge label-warning rounded">en cours de livraison</span>
                  @elseif($order->status == 2)
                      <span class="badge label-success rounded">commande livrée</span>
                  @else
                      <span class="badge label-primary rounded">en attente</span>
                  @endif
              </td>
              <td>{{ $order->created_at }}</td>
              <td>
                  <div class="btn-group">
                      <a href="{{ route('admin.orders.show', $order->code) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                  </div>
              </td>
          </tr>
      @endforeach
   
    </tbody>
</table>
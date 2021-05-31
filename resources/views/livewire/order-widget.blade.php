<tbody wire:poll.750ms>
    @foreach($orders as $key => $order)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td><a href="{{ route('admin.orders.show', $order->code) }}">{{ $order->code }}</a></td>
            <td>{{ $order->nom }} {{ $order->prenom }}</td>
            <td>{{ $order->products_count }} Items</td>
            <td>{{ $order->amount }} CFA</td>
            <td width="15%">{{ $order->created_at }}</td>
        </tr>
    @endforeach           
</tbody>

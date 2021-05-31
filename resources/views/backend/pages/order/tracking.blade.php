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
       <div>
          <livewire:orders.order-tracking :order="$order"/>
       </div>
      
      </section>
</div>
@endsection
@section('scripts')

@endsection

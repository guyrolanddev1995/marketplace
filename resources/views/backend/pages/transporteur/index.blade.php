@extends('backend.layouts.app')

@section('content')

<div>
    <section class="content-header">
        <h1> 
           Transporteurs
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Tableau de bord</a></li>
          <li class="active">Transporteurs</li>
        </ol>
    </section>
    
      <!-- Main content -->
    <section class="content container-fluid" style="margin-top:30px">
        @include('backend.partials.flash')

        <livewire:transporteur/>
    </section>
</div>
@endsection


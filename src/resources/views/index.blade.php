@extends('coupons::layouts')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  </ol>
</nav>

<div class="row">
	<h2>Coupons List</h2>
</div>

{{$dataTable->table(['class'=>'table table-bordered'],true)}}	

@push('scripts')
    {{$dataTable->scripts()}}
@endpush


@endsection
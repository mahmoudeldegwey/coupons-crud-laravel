@extends('coupons::layouts')

@section('content')

<div class="row">
	<h2>Create Coupon</h2>
</div>

<form method="POST" action="{{ route('coupons.store') }}">
    @csrf
   <div class="row">
   		<div class="col-md-6">
			<div class="form-group">
			    <label>Name</label>
			    <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">
			   
			</div>
			@error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror   			
   		</div>

		<div class="col-md-6">
		  <div class="form-group">
		    <label >Code</label>
		    <input type="text" name="code" class="form-control" placeholder="Code" value="{{ old('code') }}">
		  </div>
		  @error('code')<div class="alert alert-danger">{{ $message }}</div>@enderror
   		</div>
   </div>

   <div class="row">
   		<div class="col-md-6">
			  <div class="form-group">
			    <label >Start At</label>
			    <input type=text name="start" class="date form-control" value="{{ old('start') }}">
			  </div>
			  @error('start')<div class="alert alert-danger">{{ $message }}</div>@enderror
   		</div>

   		<div class="col-md-6">
		  <div class="form-group">
		    <label >End AT</label>
		    <input type="text" name="end" class="date form-control" value="{{ old('end') }}">
		  </div>
   		  @error('end')<div class="alert alert-danger">{{ $message }}</div>@enderror
   		</div>


   	</div>

   <div class="row">
   		<div class="col-md-6">
		  <div class="form-group">
		    <label >Discount Amount</label>
		    <input type="number" min="1" name="amount" class="form-control" value="{{ old('amount') }}">
		  </div>
   		  @error('amount')<div class="alert alert-danger">{{ $message }}</div>@enderror

   		</div>

   		<div class="col-md-6">
		  <div class="form-group">
		    <label > Maximum Usage </label>
		    <input type="number" min="1" name="max_use" class="form-control" value="{{ old('max_use') }}">
		  </div>
		  @error('max_use')<div class="alert alert-danger">{{ $message }}</div>@enderror
   		</div>

   	</div>
  	<div class="row">
  		<div class="col-md-6">
  			<div class="form-group">
			    <label >Type</label>
			    <select name="type" class="form-control">
			    	<option {{old("type") == 'fixed' ? 'selected' : ''}} value="fixed"> Fixed </option>
			    	<option {{old("type") == 'percentage' ? 'selected' : ''}} value="percentage"> Percentage </option>
			    </select>
			</div>
		  	@error('type')<div class="alert alert-danger">{{ $message }}</div>@enderror
  		</div>
  	</div>

  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
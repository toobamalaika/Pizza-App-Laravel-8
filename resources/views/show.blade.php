@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if(Auth::check())
                    	<form method="POST" action="{{ route('order.store') }}">
                    		@csrf
                    		<div class="form-group">
	                    		<p>Name: {{ auth()->user()->name }}</p>
	                    		<p>Email: {{ auth()->user()->email }}</p>
	                    		<p>Phone Number: <input type="number" name="phone" class="form-control"></p>
	                    		<p>Small Pizza Order: <input type="number" name="small_pizza" class="form-control" value="0"></p>
	                    		<p>Medium Pizza Order: <input type="number" name="medium_pizza" class="form-control" value="0"></p>
	                    		<p>Large Pizza Order: <input type="number" name="large_pizza" class="form-control" value="0"></p>
	                    		<p><input type="hidden" name="pizza_id" class="form-control" value="{{ $pizza->id }}"></p>
	                    		<p>Date: <input type="date" name="date" class="form-control" required></p>
	                    		<p>Time: <input type="time" name="time" class="form-control" required></p>
	                    		<p><textarea class="form-control" name="body" required></textarea></p>
	                    		<p><button type="submit" class="btn btn-danger">Make Order</button></p>
	                    		@if (session('message'))
			                        <div class="alert alert-success" role="alert">
			                            {{ session('message') }}
			                        </div>
			                    @endif
			                    @if (session('err-message'))
			                        <div class="alert alert-danger" role="alert">
			                            {{ session('err-message') }}
			                        </div>
			                    @endif
                    		</div>
                    	</form>
                    @else
                    	<p>
                    		<a href="/login">
                    			Please login to make order
                    		</a>
                    	</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza / {{ $pizza->name }}</div>

                <div class="card-body">
                    <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail w-100">
            		<h3>{{ $pizza->name }}</h3>
            		<h3>{{ $pizza->description }}</h3>
            		<p>Small Price: {{ $pizza->small_pizza_price }}</p>
            		<p>Medium Price: {{ $pizza->medium_pizza_price }}</p>
            		<p>Large Price: {{ $pizza->large_pizza_price }}</p>
                </div>
            </div>
        </div>

    </div>
</div>
<style type="text/css">
	a.list-group-item {
		font-size: 18px;
	}
	a.list-group-item:hover {
		background: red;
		color: #fff;
	}
	.card-header {
		background: red;
		color: #fff;
		font-size: 20px;
	}
	.b-1 {
		border: 1px solid #f7f7f7;
	}
</style>
@endsection

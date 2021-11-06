@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                    	<a href="" class="list-group-item list-group-item-action">Category 1</a>
                    	<a href="" class="list-group-item list-group-item-action">Category 2</a>
                    	<a href="" class="list-group-item list-group-item-action">Category 3</a>
                    	<a href="" class="list-group-item list-group-item-action">Category 4</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <div class="row">
                    	@forelse($pizzas as $pizza)
                    	<div class="col-md-4 mt-2 text-center b-1">
                            <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail w-100">
                    		<p>{{ $pizza->name }}</p>
                    		<p>{{ $pizza->description }}</p>
                            <a href="{{ route('pizza.show',$pizza->id) }}">
                                <button class="btn btn-danger mb-1">Order Now</button>
                            </a>
                    	</div>
                    	@empty
                    	<p>No Pizza Available</p>
                    	@endforelse
                    </div>
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

@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                	<ul class="list-group">
                		<a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                		<a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                	</ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                @if(count($errors) > 0 )
                    @foreach($errors->all() as $error )
                        <div class="alert alert-danger"> {{ $error }} </div>
                    @endforeach
                @endif
                <form method="POST" action="{{ route('pizza.update', $pizza->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                        	<label for="name">Name Of Pizza</label>
                        	<input type="text" class="form-control" name="name" placeholder="Name Of Pizza" value="{{ $pizza->name}}">
                        </div>
                        <div class="form-group">
                        	<label for="description">Description Of Pizza</label>
                        	<textarea class="form-control" name="description">{{ $pizza->description}}</textarea>
                        </div>
                        <div class="form-inline">
                        	<label for="description">Pizza price($)</label>
                        	<input name="small_pizza_price" type="number" class="form-control" placeholder="Small pizza price" value="{{ $pizza->small_pizza_price}}">
                        	<input name="medium_pizza_price" type="number" class="form-control" placeholder="Medium pizza price" value="{{ $pizza->medium_pizza_price}}">
                        	<input name="large_pizza_price" type="number" class="form-control" placeholder="Large pizza price" value="{{ $pizza->large_pizza_price}}">
                        </div>
                        <div class="form-group">
                        	<label for="description">Categoory</label>
                        	<select name="category" class="form-control">
                        		<option value="">Select Pizza</option>
                        		<option value="vegetarian">Vegetarian</option>
                        		<option value="nonvegetarian">Non Vegetarian</option>
                        		<option value="traditional">Traditional</option>
                        	</select> 
                        </div>
                        <div class="form-group">
                        	<label for="name">Image</label>
                        	<input name="image" type="file" class="form-control">
                            <img src="{{ Storage::url($pizza->image) }}" width="80">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Pizza Listing
                	<a href="{{ route('pizza.create') }}" class="btn btn-primary float-end">Add Pizza</a>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
	                    <table class="table table-striped table-hover table-bordered">
	  						<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Image</th>
							      <th scope="col">Name</th>
							      <th scope="col">Description</th>
							      <th scope="col">Small Price</th>
							      <th scope="col">Medium Price</th>
							      <th scope="col">Large Price</th>
							      <th scope="col">Category</th>
							      <th scope="col"></th>
							      <th scope="col"></th>
							    </tr>
							</thead>
							<tbody>
								@forelse($pizzas as $key => $pizza )
							    <tr>
							      <th scope="row">{{ $key+1 }}</th>
							      <td><img src="{{ Storage::url($pizza->image) }}" width="80"></td>
							      <td>{{ $pizza->name }}</td>
							      <td>{{ $pizza->description }}</td>
							      <td>{{ $pizza->small_pizza_price }}</td>
							      <td>{{ $pizza->medium_pizza_price }}</td>
							      <td>{{ $pizza->large_pizza_price }}</td>
							      <td>{{ $pizza->category }}</td>
							      <td><a href="{{ route('pizza.edit', $pizza->id ) }}" class="btn btn-primary">Edit</a></td>
							      <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pizza->id }}">Delete</button> </td>
							      	<!-- Modal -->
									<div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<form action="{{ route('pizza.destroy',$pizza->id) }}" method="POST">
											@csrf
											@method('DELETE')
										  	<div class="modal-dialog">
										    	<div class="modal-content">
										      		<div class="modal-header">
										        		<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
										        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										      		</div>
										      		<div class="modal-body">
										        		Are you sure ?
										      		</div>
										      		<div class="modal-footer">
										        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										        		<button type="submit" class="btn btn-danger">Delete</button>
										      		</div>
										    </div>
										  </div>
										</form>
									</div>
							    </tr>
							    @empty
							    <tr class="text-center">
							    	<td colspan="9"> No Record</td>
							    </tr>
							    @endforelse
							</tbody>
						</table>
						{{ $pizzas->links() }}
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

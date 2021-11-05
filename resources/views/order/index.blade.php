@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page">Orders</li>
			  </ol>
			</nav>
            <div class="card">
                <div class="card-header">Order</div>

                <div class="card-body">
                    <div class="table-responsive">
	                    <table class="table table-striped table-hover table-bordered">
	  						<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">User</th>
							      <th scope="col">Phone/Email</th>
							      <th scope="col">Date/Time</th>
							      <th scope="col">Pizza</th>
							      <th scope="col">Small Price</th>
							      <th scope="col">Medium Price</th>
							      <th scope="col">Large Price</th>
							      <th scope="col">Total($)</th>
							      <th scope="col">Message</th>
							      <th scope="col">Status</th>
							      <th scope="col">Accept</th>
							      <th scope="col">Reject</th>
							      <th scope="col">Completed</th>
							    </tr>
							</thead>
							<tbody>
								@forelse($orders as $key => $order )
								<tr>
									<td>{{ $key+1 }}</td>
							      	<td>{{ $order->user->name }}<br>{{ $order->phone }}</td>
								    <td>{{ $order->user->email }}</td>
								    <td>{{ $order->date }} - {{ $order->time }}</td>
								    <td>{{ $order->pizza->name }}</td>
								    <td>{{ $order->small_pizza }}</td>
								    <td>{{ $order->medium_pizza }}</td>
								    <td>{{ $order->large_pizza }}</td>
								    <td>
								    	{{
								    		($order->pizza->small_pizza_price * $order->small_pizza) +
								    		($order->pizza->medium_pizza_price * $order->medium_pizza) +
								    		($order->pizza->large_pizza_price * $order->large_pizza)
								    	}}
								    </td>
								    <td>{{ $order->body }}</td>
								    <td>{{ ucfirst($order->status) }}</td>
								    <form method="POST" action="{{ route('order.status', $order->id) }}">
								    	@csrf
									    <td>
									    	<input type="submit" name="status" value="accepted" class="btn btn-sm btn-primary">
									    </td>
									    <td>
									    	<input type="submit" name="status" value="rejected" class="btn btn-sm btn-danger">
									    </td>
									    <td>
									    	<input type="submit" name="status" value="completed" class="btn btn-sm btn-success">
									    </td>
									</form>
								</tr>
								@empty
								 <tr class="text-center">
							    	<td colspan="9"> No Record</td>
							    </tr>
							    @endforelse
							</tbody>
						</table>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

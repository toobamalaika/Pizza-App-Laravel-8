@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item active" aria-current="page">Customers</li>
			  </ol>
			</nav>
            <div class="card">
                <div class="card-header">
                	Customers
                	<a href="{{ route('pizza.create') }}" class="btn btn-sm btn-success float-end m-1">Create Pizza</a>
                	<a href="{{ route('pizza.index') }}" class="btn btn-sm btn-primary float-end m-1">View Pizzas</a>
            	</div>

                <div class="card-body">
                    <div class="table-responsive">
	                    <table class="table table-striped table-hover table-bordered">
	  						<thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Member Since</th>
							    </tr>
							</thead>
							<tbody>
								@forelse($customers as $key => $customer )
								<tr>
									<td>{{ $key+1 }}</td>
							      	<td>{{ $customer->name }}</td>
								    <td>{{ $customer->email }}</td>
								    <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
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

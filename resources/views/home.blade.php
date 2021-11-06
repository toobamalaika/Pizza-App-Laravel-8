@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Your Orders
                </div>

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

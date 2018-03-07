@extends('front.layout')

@section('head_title', 'Checkout - Finished')

@section('content')
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>
					Checkout - Finished
				</span>
			</h2>
		</div>
	</div>
</div>
<div id="content">
	<div class="container portfolio">
		<div class="row">
			<div class="col-md-12">
				@include('front.global-partials.system-messages')
				
				<div class="jumbotron">
					<h1>Order #{{$order->id}}</h1>
				</div>
				<hr>
				<h2>Order Items</h2>
				<table id="shopping-cart-table" class="table table-striped table-hover">
					<thead>
						<th></th>
						<th>Photo</th>
						<th>Title</th>
						<th class="text-right">Price</th>
						<th class="text-right" colspan="2">Qty</th>
						<th class="text-right" colspan="2">Subtotal</th>
					</thead>
					<tbody>
                                            @foreach($order->orderItems as $orderItem)
						<tr>
							<td class="text-center">
								  {{$loop->iteration}}
							</td>
							<td>
                                                            @if($orderItem->product_photo_url)
                                                            <img src="{{$orderItem->product_photo_url}}" style="width: 100px;" alt="">
                                                            @endif
							</td{{$orderItem->product_title}}</td>
							<td class="text-right">
								{{number_format($orderItem->product_price,2)}}
								din.
							</td>
							<td class="text-center">x</td>
							<td class="text-right">
								{{$orderItem->quantity}}
							</td>
							<td class="text-center">=</td>
							<td class="text-right">
									{{number_format($orderItem->subtotal(),2)}}
								din.
							</td>
						</tr>
                                                @endforeach
					</tbody>
					<tfoot>
						<th class="h2 text-right" colspan="7">TOTAL:</th>
						<td class="h2 text-right">
							{{number_format($order->total())}}
							din.
						</td>
					</tfoot>
				</table>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h2>Customer Info</h2>
						<table class="table">
							<tbody>
								<tr>
									<th>Name:</th>
									<td>{{$order->customer_name}}</td>
								</tr>
								<tr>
									<th>Email:</th>
									<td>{{$order->customer_email}}</td>
								</tr>
								<tr>
									<th>Phone:</th>
									<td>{{$order->customer_phone}}</td>
								</tr>
								<tr>
									<th>Address:</th>
									<td>
										{{$order->customer_address}}
										<br>
										{{$order->customer_zip}}
                                                                                {{$order->customer_city}}
										<br>
										{{$order->customer_country}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6 text-right">
						<h2>Delivery Address</h2>
						<div class="well well-lg">
							<p>{{$order->delivery_address}}</p>
							<p>{{$order->delivery_zip}}
                                                        {{$order->delivery_city}}</p>
							<p>{{$order->delivery_country}}</p>
						</div>
					</div>
				</div>
				<hr>
				<div class="text-right">
					<a href="{{url('/')}}" class="btn btn-default">
						Ok
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
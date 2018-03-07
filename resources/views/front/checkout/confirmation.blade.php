@extends('front.layout')

@section('head_title', 'Checkout - Confirmation')

@section('content')
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>
					Checkout - Confirmation
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
				
				<h2>Shopping Cart</h2>
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
                                            @foreach($shoppingCart->getItems() as $shoppingCartItem)
						<tr>
							<td class="text-center">
                                                            {{$loop->iteration}}
								
							</td>
							<td>
                                                            @if($shoppingCartItem->getProductPhotoUrl())
								<img src="{{$shoppingCartItem->getProductPhotoUrl()}}" style="width: 100px;" alt="">
                                                                @endif
							</td>
							<td>{{$shoppingCartItem->getProductTitle()}}</td>
							<td class="text-right">
								{{number_format($shoppingCartItem->getProductPrice(),2)}}
								din.
							</td>
							<td class="text-center">x</td>
							<td class="text-right">
								{{$shoppingCartItem->getQuantity()}}
							</td>
							<td class="text-center">=</td>
							<td class="text-right">
								{{number_format($shoppingCartItem->subtotal(),2)}}
								din.
							</td>
						</tr>
                                                @endforeach
					</tbody>
					<tfoot>
						<th class="h2 text-right" colspan="7">TOTAL:</th>
						<td class="h2 text-right">
						{{number_format($shoppingCart->total(),2)}}
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
									<td>{{$checkout->getCustomerName()}}</td>
								</tr>
								<tr>
									<th>Email:</th>
									<td>{{$checkout->getCustomerEmail()}}</td>
								</tr>
								<tr>
									<th>Phone:</th>
									<td>{{$checkout->getCustomerPhone()}}</td>
								</tr>
								<tr>
									<th>Address:</th>
									<td>
										{{$checkout->getCustomerAddress()}}
										<br>
										{{$checkout->getCustomerZip()}}
                                                                                {{$checkout->getCustomerCity()}}
										<br>
										{{$checkout->getCustomerCountry()}}
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6 text-right">
						<h2>Delivery Address</h2>
						<div class="well well-lg">
							<p>{{$checkout->getDeliveryAddress()}}</p>
							<p>{{$checkout->getDeliveryZip()}}
                                                        {{$checkout->getDeliveryCity()}}
                                                        </p>
							<p>	{{$checkout->getDeliveryCountry()}}</p>
						</div>
					</div>
				</div>
				<hr>
				<div class="well well-sm text-right">
					By clicking on "Confirm" button you are accepting
					<a href="#">Terms of service</a>
				</div>
				<hr>
				<form method="post" class="text-right">
					{{csrf_field()}}
					<a href="{{route('checkout')}}" class="btn btn-default pull-left">
						Back
					</a>
					<button class="btn btn-success" type="submit">
						<i class="fa fa-credit-card"></i>
						Confirm
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
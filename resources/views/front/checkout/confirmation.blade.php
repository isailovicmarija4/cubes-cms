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
				<!-- system Messages -->
				
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
						<tr>
							<td class="text-center">
								1
							</td>
							<td>
								<img src="/skins/front/img/portfolio/enkel-home-blue.png" style="width: 100px;" alt="">
							</td>
							<td>Samsung UE-32J4000AWXXH</td>
							<td class="text-right">
								32985.76
								din.
							</td>
							<td class="text-center">x</td>
							<td class="text-right">
								2
							</td>
							<td class="text-center">=</td>
							<td class="text-right">
								65971.52
								din.
							</td>
						</tr>
					</tbody>
					<tfoot>
						<th class="h2 text-right" colspan="7">TOTAL:</th>
						<td class="h2 text-right">
							65971.52
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
									<td>First Last</td>
								</tr>
								<tr>
									<th>Email:</th>
									<td>mailbox@example.com</td>
								</tr>
								<tr>
									<th>Phone:</th>
									<td>+381 63 338 923</td>
								</tr>
								<tr>
									<th>Address:</th>
									<td>
										Customer Street 34
										<br>
										11000 Belgrade
										<br>
										Serbia
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6 text-right">
						<h2>Delivery Address</h2>
						<div class="well well-lg">
							<p>Street Addres 35/22</p>
							<p>11000 Belgrade</p>
							<p>Serbia</p>
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
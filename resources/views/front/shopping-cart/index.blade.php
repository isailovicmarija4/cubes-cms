@extends('front.layout')

@section('head_title', 'Shopping cart')

@section('content')
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>
					Shopping Cart
				</span>
			</h2>
		</div>
	</div>
</div>
<div id="content">
	<div class="container portfolio">
		<div class="row">
			<div class="col-md-12">
				<!-- system messages -->
				@include('front.global-partials.system-messages')
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
								<button 
									data-action="delete" 
									data-id="1"
									><i class="fa fa-trash"></i>
								</button>
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
				<div class="text-right">
					<a href="#" class="btn btn-success">
						<i class="fa fa-credit-card"></i>
						Checkout
					</a>
				</div>
				
				<div class="jumbotron">
					<h1>Shopping cart is empty</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<form method="post" action="#" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Remove Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to remove product from shopping cart?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
			</div>
		</div>
	</div>
</form>
@endsection

@push('footer_javascript')
<script>
	$('#shopping-cart-table').on('click', '[data-action="delete"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var deletePopup = $('#delete-record-modal');
		
		deletePopup.find('[name="id"]').val(id);
		
		deletePopup.modal('show');
	});
	
</script>
@endpush
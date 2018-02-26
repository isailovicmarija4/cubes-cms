@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.products.index')}}">Products</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('admin.product-brands.index')}}">Product Brands</a>
	</li>
</ol>
<h1>Product Brands List</h1>
<hr>			

@include('admin.global-partials.system-messages')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Product Brands list

		<div class="btn-group btn-group-sm float-right">
			<a class="btn btn-secondary" href="{{route('admin.product-brands.add')}}">
				<i class="fa fa-plus"></i>
				Add Product Brand
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="records-table" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Website Url</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($productBrands as $productBrand)
					<tr>
						<td>{{$productBrand->id}}</td>
						<td>{{$productBrand->title}}</td>
						<td>{{$productBrand->website_url}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a 
									class="btn btn-secondary"
									href="{{route('admin.product-brands.edit', ['id' => $productBrand->id])}}"
									title="edit"
								><i class="fa fa-pencil"></i></a>
								
								<button 
									class="btn btn-secondary" 
									title="delete" 
									data-action="delete"
									data-id="{{$productBrand->id}}"
								>
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<form method="post" action="{{route('admin.product-brands.delete')}}" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Product Brand</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete product brand?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</form>
@endsection

@push('footer_javascript')
<script>
	$('#records-table').on('click', '[data-action="delete"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var deletePopup = $('#delete-record-modal');
		
		deletePopup.find('[name="id"]').val(id);
		
		deletePopup.modal('show');
	});
	
</script>
@endpush
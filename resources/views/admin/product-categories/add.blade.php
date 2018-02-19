@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.products.index')}}">Products</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('admin.product-categories.index')}}">Product Categories</a>
	</li>
	<li class="breadcrumb-item active">
		Add
	</li>
</ol>
<h1>Add new Product Category</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Add Product Category
	</div>
	<div class="card-body">

		<form action="" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label>Product Group</label>
				<select class="form-control" name="product_group_id">
					<option>--- Choose Product Group ---</option>
					@foreach($allProductGroups as $productGroup)
					<option 
						{{old('product_group_id') == $productGroup->id ? 'selected' : ''}}
						value="{{$productGroup->id}}">
						{{$productGroup->title}}
					</option>
					@endforeach
				</select>
				@if($errors->has('product_group_id'))
				<div class="form-errors text-danger">
					@foreach($errors->get('product_group_id') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group">
				<label for="title">Title</label> 
				<input value="{{old('title')}}" name="title" placeholder="Enter Title" aria-describedby="titleHelpBlock" required="required" class="form-control here" type="text"> 
				@if($errors->has('title'))
				<div class="form-errors text-danger">
					@foreach($errors->get('title') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group">
				<label>Description</label> 
				<input value="{{old('description')}}" name="description" placeholder="Enter description" aria-describedby="titleHelpBlock" class="form-control here" type="text"> 
				@if($errors->has('description'))
				<div class="form-errors text-danger">
					@foreach($errors->get('description') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group text-right">
				<a href="{{route('admin.product-categories.index')}}" class="btn btn-secondary">Cancel</a>
				<button name="submit" type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
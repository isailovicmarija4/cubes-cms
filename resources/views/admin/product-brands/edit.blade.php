@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.products.index')}}">Products</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{route('admin.product-brands.index')}}">Product Brands</a>
	</li>
	<li class="breadcrumb-item active">
		Edit
	</li>
</ol>
<h1>Edit Product Brand: {{$productBrand->title}}</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Product Brand
	</div>
	<div class="card-body">

		<form action="" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label> 
				<input value="{{old('title', $productBrand->title)}}" name="title" placeholder="Enter Title" aria-describedby="titleHelpBlock" required="required" class="form-control here" type="text"> 
				@if($errors->has('title'))
				<div class="form-errors text-danger">
					@foreach($errors->get('title') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group">
				<label>Website Url</label> 
				<input value="{{old('website_url', $productBrand->website_url)}}" name="website_url" placeholder="Enter Website Url" class="form-control here" type="text"> 
				@if($errors->has('website_url'))
				<div class="form-errors text-danger">
					@foreach($errors->get('website_url') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group text-right">
				<a href="{{route('admin.product-brands.index')}}" class="btn btn-secondary">Cancel</a>
				<button name="submit" type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
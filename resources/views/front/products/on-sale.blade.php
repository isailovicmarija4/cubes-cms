@extends('front.layout')

@section('head_title', 'Products on sale')

@section('content')
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>Products on sale</span> 
				<small>{{$products->total()}} products</small>
			</h2>
		</div>
	</div>
</div>
<div id="content">
	<div class="container portfolio">
		<ul class="thumbnails row block projects" id="quicksand">
			@foreach($products as $product)
			<li class="col-md-3">
				@include('front.products.partials.product-list', ['product' => $product])
			</li>
			@endforeach
		</ul>
	</div>
	<div class="text-center">
		{{$products->links()}}
	</div>
</div>
@endsection
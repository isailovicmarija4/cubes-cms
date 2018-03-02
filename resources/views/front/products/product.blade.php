@extends('front.layout')

@section('head_title', 'Product ' . $product->title)

@section('content')
<style>
	dt {margin-bottom: 5px;}
	dd {margin-bottom: 10px;}
</style>		
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h2 class="page-title">
				<span>
					Brand 
					{{$product->title}}
				</span>
			</h2>
		</div>
	</div>
</div>
<div id="content">
	<div class="container portfolio">
		<!--Portfolio feature item-->
		<div class="row">
			<div class="col-md-7 project-photos">
				<img 
					class="img-responsive center-block" 
					alt="{{$product->title}}" 
					src="/skins/front/img/portfolio/enkel-home-blue.png">
			</div>
			<div class="col-md-5 sidebar sidebar-right">
				<!-- quick details -->
				<div class="block">
					<h3 class="block-title">
						<span>{{$product->title}}</span>
					</h3>
					<dl>
						<dt>Brand:</dt>
						<dd>
							Apple
						</dd>
						<dt>Category:</dt>
						<dd>
							<a href="#">
								Category
							</a>
						</dd>

						<dt>Description:</dt>
						<dd>
							<div class="well well-sm">
							{{$product->description}}
							</div>
						</dd>

						<dt>Tags:</dt>
						<dd>
							@foreach($product->tags as $tag)
							<a href="#" class="btn btn-success">
								{{$tag->title}}
							</a>
							@endforeach
						</dd>
					</dl>
				</div>
				<h4>
					<strong>Price: </strong>
					{{number_format($product->price, 2)}} din
					
				</h4>
                                <hr>
                                <form method="post" action="{{route('shopping-cart.add-product')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <div class="text-right">
                                        <label>Quantity: </label>
                                        <input type="number" value="1" name="quantity">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart">
                                                
                                            </i>
                                        </button>
                                    </div>
                                    
                                    
                                    @foreach($errors->all() as $errorMessage)
                                    <div class="text-danger">
                                        {{$errorMessage}}
                                    </div>
                                    @endforeach
                                    
                                    
                                    
                                </form>
                                
			</div>
		</div>
		<div class="block">
			<h3 class="block-title">
				Specs
			</h3>
			<div class="block">
				{!! $product->specification !!}
			</div>
		</div>
	</div>
</div>
@endsection
<div class="">
	<div class="project">
		<a class="lnk-polaroid" href="{{url('/products/product/' . $product->id)}}">
			@if($product->photo_filename && \Storage::disk('public')->exists('/products/' . $product->photo_filename))
			<img 
				class="img-polaroid img-responsive" 
				src="{{\Storage::disk('public')->url('/products/' . $product->photo_filename)}}" 
				alt="{{$product->title}}"
			>
			@else
			<img 
				class="img-polaroid img-responsive" 
				src="/skins/front/img/portfolio/enkel-home-blue.png" 
				alt="{{$product->title}}"
			>
			@endif
		</a>
		<h3 class="title">
			<a href="{{url('/products/product/' . $product->id)}}">
				Brand - {{$product->title}}
			</a>
		</h3>
		<div class="row">
			<h4 class="col-xs-5">
				<small>
					<a href="#">
						Category
					</a>
				</small>
			</h4>
			<h4 class="col-xs-7 text-right">
				{{number_format($product->price, 2)}} din
			</h4>
		</div>
	</div>
</div>
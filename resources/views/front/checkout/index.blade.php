@extends('front.layout')

@section('head_title', 'Checkout')

@section('content')
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>Checkout</span>
					</h2>
				</div>
			</div>
		</div>
		<div id="content" class="demos">
			<div class="container">
				<div class="row">
					<div class="col-md-12 blog-post">
						<!-- system messages -->
						
						<form action="" method="post" class="form-horizontal">
							{{csrf_field()}}
							<fieldset>
								<!-- Form Name -->
								<legend>Customer info</legend>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Your name:</label>  
									<div class="col-md-5">
										<input name="customerName" class="form-control" type="text" value="{{old('customerName')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerName'))
										<ul class="text-danger">
											@foreach($errors->get('customerName') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your email:</label>  
									<div class="col-md-5">
										<input name="customerEmail" class="form-control" type="text" value="{{old('customerEmail')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerEmail'))
										<ul class="text-danger">
											@foreach($errors->get('customerEmail') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your phone:</label>  
									<div class="col-md-5">
										<input name="customerPhone" class="form-control" type="text" value="{{old('customerPhone')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerPhone'))
										<ul class="text-danger">
											@foreach($errors->get('customerPhone') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your Country:</label>  
									<div class="col-md-5">
										<input name="customerCountry" class="form-control" type="text" value="{{old('customerCountry')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerCountry'))
										<ul class="text-danger">
											@foreach($errors->get('customerCountry') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your City:</label>  
									<div class="col-md-5">
										<input name="customerCity" class="form-control" type="text" value="{{old('customerCity')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerCity'))
										<ul class="text-danger">
											@foreach($errors->get('customerCity') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your ZIP Code:</label>  
									<div class="col-md-5">
										<input name="customerZip" class="form-control" type="text" value="{{old('customerZip')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerZip'))
										<ul class="text-danger">
											@foreach($errors->get('customerZip') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your Address:</label>  
									<div class="col-md-5">
										<input name="customerAddress" class="form-control" type="text" value="{{old('customerAddress')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('customerAddress'))
										<ul class="text-danger">
											@foreach($errors->get('customerAddress') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
							</fieldset>
							<fieldset readonly>

								<!-- Form Name -->
								<legend>
									Delivery
									<div class="pull-right">
										<label>
											<input type="checkbox" id="check_delivery_same" name="kk">
											<small>same as your address</small>
										</label>
									</div>
								</legend>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Delivery Country:</label>  
									<div class="col-md-5">
										<input name="deliveryCountry" class="form-control" type="text" value="{{old('deliveryCountry')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('deliveryCountry'))
										<ul class="text-danger">
											@foreach($errors->get('deliveryCountry') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Delivery City:</label>  
									<div class="col-md-5">
										<input name="deliveryCity" class="form-control" type="text" value="{{old('deliveryCity')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('deliveryCity'))
										<ul class="text-danger">
											@foreach($errors->get('deliveryCity') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Delivery ZIP Code:</label>  
									<div class="col-md-5">
										<input name="deliveryZip" class="form-control" type="text" value="{{old('deliveryZip')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('deliveryZip'))
										<ul class="text-danger">
											@foreach($errors->get('deliveryZip') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Delivery Address:</label>  
									<div class="col-md-5">
										<input name="deliveryAddress" class="form-control" type="text" value="{{old('deliveryAddress')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('deliveryAddress'))
										<ul class="text-danger">
											@foreach($errors->get('deliveryAddress') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
							</fieldset>
							<fieldset>
								<legend></legend>
								<div class="form-group text-right">
									<a href="#" class="btn btn-default pull-left">Back</a>
									<button type="submit" class="btn btn-success">
										<i class="fa fa-credit-card"></i>
										Next
									</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
@endsection
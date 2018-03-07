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
						
						<form id="checkout-form" action="" method="post" class="form-horizontal">
							{{csrf_field()}}
							<fieldset>
								<!-- Form Name -->
								<legend>Customer info</legend>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Your name:</label>  
									<div class="col-md-5">
                                                                            <input name="customerName" class="form-control" type="text" value="{{old('customerName',$checkout->getCustomerName())}}">
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
										<input name="customerEmail" class="form-control" type="text" value="{{old('customerEmail',$checkout->getCustomerEmail())}}">
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
										<input name="customerPhone" class="form-control" type="text" value="{{old('customerPhone',$checkout->getCustomerPhone())}}">
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
										<input name="customerCountry" class="form-control" type="text" value="{{old('customerCountry',$checkout->getCustomerCountry())}}">
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
										<input name="customerCity" class="form-control" type="text" value="{{old('customerCity',$checkout->getCustomerCity())}}">
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
										<input name="customerZip" class="form-control" type="text" value="{{old('customerZip',$checkout->getCustomerZip())}}">
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
										<input name="customerAddress" class="form-control" type="text" value="{{old('customerAddress',$checkout->getCustomerAddress())}}">
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
							<fieldset  >

								<!-- Form Name -->
								<legend>
									Delivery
									<div class="pull-right">
										<label id="check_delivery_same">
											<input type="checkbox">
											<small>same as your address</small>
										</label>
									</div>
								</legend>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Delivery Country:</label>  
									<div class="col-md-5">
										<input name="deliveryCountry" class="form-control" type="text" value="{{old('deliveryCountry',$checkout->getDeliveryCountry())}}">
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
										<input name="deliveryCity" class="form-control" type="text" value="{{old('deliveryCity',$checkout->getDeliveryCity())}}">
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
										<input name="deliveryZip" class="form-control" type="text" value="{{old('deliveryZip',$checkout->getDeliveryZip())}}">
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
										<input name="deliveryAddress" class="form-control" type="text" value="{{old('deliveryAddress',$checkout->getDeliveryAddress())}}">
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
									<a href="{{route('shopping-cart')}}" class="btn btn-default pull-left">Back</a>
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
@push('footer_javascript')
<script>
$('#check_delivery_same').on('click',function(e){
    var targetElement=$(this);
    if(targetElement.find('input[type="checkbox"]').is(':checked')){
      $('#checkout-form [name^="delivery"]').attr('readonly', 'readonly')  ;
    $('#checkout-form [name^="deliveryCountry"]').val(
            $('#checkout-form [name="customerCountry"]').val()  );
       $('#checkout-form [name^="deliveryCity"]').val(
            $('#checkout-form [name="deliveryCity"]').val()  );
       $('#checkout-form [name^="deliveryZip"]').val(
            $('#checkout-form [name="customerZip"]').val()  );
       $('#checkout-form [name^="deliveryCity"]').val(
            $('#checkout-form [name="customerCity"]').val()  );
        }else{
              $('#checkout-form [name^="delivery"]').removeAttr('readonly');
        }
    
    
    
    
});
$('#checkout-form [name="customerCountry"]').on('keyup',function(e){
     var targetElement=$(this);
     if($('#check_delivery_same input[type="checkbox"]').is(':checked')){
       $('#checkout-form [name="deliveryCountry"]').val( targetElement.val());
              }
     });   

            

           




</script>
@endpush
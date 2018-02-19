@extends('front.layout')

@section('head_title', trans('front.contact_us_title'))

@section('content')
		<div id="highlighted">
			<div class="container">
				<div class="header">
					<h2 class="page-title">
						<span>Contact</span>
					</h2>
				</div>
			</div>
		</div>
		<div id="content" class="demos">
			<div class="container">
				<div class="row">
					<!--Blog Roll Content-->
					
					<div class="col-md-8 blog-post">
						@if(!empty($systemMessage))
						
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							{{$systemMessage}}
						</div>
						
						@endif
						<form action="" method="post" class="form-horizontal">
							{{csrf_field()}}
							<fieldset>

								<!-- Form Name -->
								<legend>Contact us</legend>
								
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Your name:</label>  
									<div class="col-md-5">
										<input name="contact_name" class="form-control" type="text" value="{{old('contact_name')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('contact_name'))
										<ul class="text-danger">
											@foreach($errors->get('contact_name') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Your email:</label>  
									<div class="col-md-5">
										<input name="contact_email" class="form-control" type="text" value="{{old('contact_email')}}">
									</div>
									<div class="col-md-4">
										@if($errors->has('contact_email'))
										<ul class="text-danger">
											@foreach($errors->get('contact_email') as $errorMessage)
											<li>{{$errorMessage}}</li>
											@endforeach
										</ul>
										@endif
									</div>
								</div>
								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-3 control-label">Your Question:</label>  
									<div class="col-md-5">
										<textarea name="contact_question" class="form-control">{{old('contact_question')}}</textarea>
									</div>
									<div class="col-md-4">
										@if($errors->has('contact_question'))
										<ul class="text-danger">
											@foreach($errors->get('contact_question') as $errorMessage)
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
									<button type="submit" class="btn btn-default">Send</button>
								</div>
							</fieldset>
						</form>
						
					</div>
					<!--Sidebar-->
					<div class="col-md-4 sidebar sidebar-right">
						<div class="inner">
							<div class="block">
								<a href="#" class="btn btn-block btn-info"><i class="fa fa-download"></i> Download Our Press Kit</a>
								<a href="#" class="btn btn-block btn-success"><i class="fa fa-envelope-o"></i> Get In Touch</a>
								<a href="#" class="btn btn-block btn-warning"><i class="fa fa-rss"></i> Subscribe via RSS feed</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
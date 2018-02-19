@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.users.index')}}">Users</a>
	</li>
	<li class="breadcrumb-item active">
		Add
	</li>
</ol>
<h1>Add new user</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Add User
	</div>
	<div class="card-body">

		<form action="" method="post" id="record-form">
			{{csrf_field()}}
			<div class="form-group">
				<label>Name</label> 
				<input value="{{old('name')}}" name="name" placeholder="Enter name" required="required" class="form-control here" type="text"> 
				<div class="form-errors text-danger">
				@if($errors->has('name'))
					@foreach($errors->get('name') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				@endif
				</div>
			</div> 
			<div class="form-group">
				<label>Email</label> 
				<input value="{{old('email')}}" name="email" placeholder="Enter email" required="required" class="form-control here" type="text"> 
				<div class="form-errors text-danger">
				@if($errors->has('email'))
					@foreach($errors->get('email') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				@endif
				</div>
			</div> 
			<div class="form-group">
				<label>Password</label> 
				<input name="password" placeholder="Enter password" required="required" class="form-control here" type="password"> 
				<div class="form-errors text-danger">
				@if($errors->has('password'))
					@foreach($errors->get('password') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				@endif
				</div>
			</div> 
			<div class="form-group">
				<label>Confirm Password</label> 
				<input name="password_confirmation" placeholder="Repeat password" required="required" class="form-control here" type="password"> 
				<div class="form-errors text-danger">
				@if($errors->has('password_confirmation'))
					@foreach($errors->get('password_confirmation') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				@endif
				</div>
			</div> 
			<div class="form-group text-right">
				<a href="{{route('admin.users.index')}}" class="btn btn-secondary">Cancel</a>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection

@push('footer_javascript')
<script src="{{url('/skins/admin/vendor/jquery-validation/dist/jquery.validate.min.js')}}" type="text/javascript"></script>
<script>

$('#record-form').validate({
	'rules': {
		'name': {
			'required': true,
			'minlength': 2
		},
		'email': {
			'required': true,
			'email': true,
			'remote': {
				'url': "{{route('admin.users.check-email')}}",
				'type': 'post',
				'data': {
					'_token': "{{csrf_token()}}"
				}
			}
		},
		'password': {
			'required': true,
			'minlength': 5
		},
		'password_confirmation': {
			'required': true,
			'equalTo': '#record-form [name="password"]'
		}
	},
	'errorPlacement': function(error, element) {
		element.closest('.form-group').find('.form-errors').append(error);
	}
});

</script>
@endpush
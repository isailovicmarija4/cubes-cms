@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.tags.index')}}">Tags</a>
	</li>
	<li class="breadcrumb-item active">
		Edit
	</li>
</ol>
<h1>Edit Tag: {{$tag->title}}</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Tag
	</div>
	<div class="card-body">

		<form action="" method="post">
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title</label> 
				<input value="{{old('title', $tag->title)}}" name="title" placeholder="Enter Title" aria-describedby="titleHelpBlock" required="required" class="form-control here" type="text"> 
				@if($errors->has('title'))
				<div class="form-errors text-danger">
					@foreach($errors->get('title') as $errorMessage)
					<label class="error">{{$errorMessage}}</label>
					@endforeach
				</div>
				@endif
			</div> 
			<div class="form-group text-right">
				<a href="{{route('admin.tags.index')}}" class="btn btn-secondary">Cancel</a>
				<button name="submit" type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.index-slides.index')}}">Index Slides</a>
	</li>
	<li class="breadcrumb-item active">
		Add
	</li>
</ol>
<h1>Add new Slide</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Add Slide
	</div>
	<div class="card-body">

		<form action="" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<fieldset class="col-lg-6">
					<legend>General settings</legend>
					<div class="form-group">
						<label>Title</label> 
						<input value="{{old('title')}}" name="title" placeholder="Enter Title" required="required" class="form-control" type="text"> 
						@if($errors->has('title'))
						<div class="form-errors text-danger">
							@foreach($errors->get('title') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Url</label> 
						<input value="{{old('url')}}" name="url" placeholder="Enter Url on slide click" class="form-control" type="text"> 
						@if($errors->has('url'))
						<div class="form-errors text-danger">
							@foreach($errors->get('url') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div>
					<div class="form-group">
						<label>Description</label> 
						<textarea name="description" placeholder="Enter Description" class="form-control" rows="12">{{old('description')}}</textarea>
						@if($errors->has('description'))
						<div class="form-errors text-danger">
							@foreach($errors->get('description') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div> 
				</fieldset>
				<fieldset class="col-lg-6">
					<legend>Slide photo</legend>
					<div class="text-center mb-5">
						<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/640x480" alt="placeholder">
					</div>

					<div class="form-group">
						<label>Upload photo</label>
						<div class="custom-file">
							<input name="slide_photo_file" type="file" class="custom-file-input" id="slide_photo_file">
							<label class="custom-file-label" for="slide_photo_file">Choose photo</label>
						</div>
						@if($errors->has('slide_photo_file'))
						<div class="form-errors text-danger">
							@foreach($errors->get('slide_photo_file') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div>
				</fieldset>
			</div>
			<div class="row mb-5">
				<div class="col-lg-12">
					<hr>
				</div>
			</div>
			<div class="form-group text-right">
				<a href="{{route('admin.index-slides.index')}}" class="btn btn-secondary">Cancel</a>
				<button name="submit" type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
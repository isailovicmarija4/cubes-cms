@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.static-pages.index')}}">Static Pages</a>
	</li>
       @if(!empty($parentPage))
          @foreach($parentPage->breadcrumbs() as $breadcrumbPage)
          <li class="breadcrumb-item">
              <a href="{{route('admin.static-pages.index',['parentId'=>$breadcrumbPage->id])}}">{{$breadcrumbPage->short_title}}</a>
              
		
	</li>
                
                @endforeach
                @endif
                
	<li class="breadcrumb-item active">
		Add
	</li>
</ol>
<h1>Add new Static Page</h1>
<hr>			

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Add Static Page
	</div>
	<div class="card-body">

		<form action="" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="row">
				<fieldset class="col-lg-6">
					<legend>General settings</legend>
					<div class="form-group">
						<label>Short title</label> 
						<input value="{{old('short_title')}}" name="short_title" placeholder="Enter Short Title" class="form-control" type="text"> 
						@if($errors->has('url'))
						<div class="form-errors text-danger">
							@foreach($errors->get('short_title') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div>
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
					<legend>Page leading photo</legend>
					<div class="text-center mb-5">
						<img class="img-fluid img-thumbnail" src="http://via.placeholder.com/640x480" alt="placeholder">
					</div>

					<div class="form-group">
						<label>Upload photo</label>
						<div class="custom-file">
							<input name="page_photo_file" type="file" class="custom-file-input" id="page_photo_file">
							<label class="custom-file-label" for="page_photo_file">Choose photo</label>
						</div>
						@if($errors->has('page_photo_file'))
						<div class="form-errors text-danger">
							@foreach($errors->get('page_photo_file') as $errorMessage)
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
			<div class="row">
				<fieldset class="col-lg-12">
					<legend>Body</legend>
					<div class="form-group">
						<textarea name="body" class="form-control" rows="20">{{old('body')}}</textarea>
						@if($errors->has('body'))
						<div class="form-errors text-danger">
							@foreach($errors->get('body') as $errorMessage)
							<label class="error">{{$errorMessage}}</label>
							@endforeach
						</div>
						@endif
					</div>
				</fieldset>
			</div>
			<div class="form-group text-right">
				<a href="{{route('admin.static-pages.index',[
                                   'parentId'=>!empty($parentPage) ? $parentPage->id : 0
                                   ])}}" class="btn btn-secondary">Cancel</a>
				<button name="submit" type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection
@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.filemanager.index')}}">File Manager</a>
	</li>
</ol>
<h1>File Manager</h1>
<hr>
<div class="row">
	<div class="col-xs-12" id="filemanager">
		
	</div>
</div>
@endsection

@push('head_links')

<link href="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{url('/skins/admin/vendor/elfinder/css/elfinder.full.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{url('/skins/admin/vendor/elfinder/css/theme.css')}}" rel="stylesheet" type="text/css"/>

@endpush

@push('footer_javascript')

<script src="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{url('/skins/admin/vendor/elfinder/js/elfinder.full.js')}}" type="text/javascript"></script>
<script>
	$('#filemanager').elfinder({
		'url': "{{route('admin.filemanager.connector')}}",
		'customData': {
			'_token': "{{csrf_token()}}"
		}
	});
</script>
@endpush
<!DOCTYPE html>
<html>
	<head>
		<link href="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{url('/skins/admin/vendor/elfinder/css/elfinder.full.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{url('/skins/admin/vendor/elfinder/css/theme.css')}}" rel="stylesheet" type="text/css"/>

	</head>
	<body>
		<div id="filemanager">

		</div>
		<script src="{{url('/skins/admin/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
		<script src="{{url('/skins/admin/vendor/elfinder/js/elfinder.full.js')}}" type="text/javascript"></script>
		<script>
			$('#filemanager').elfinder({
				'url': "{{route('admin.filemanager.connector')}}",
				'customData': {
					'_token': "{{csrf_token()}}"
				},
				getFileCallback : function(file, fm) {
					window.opener.CKEDITOR.tools.callFunction((function() {
						var reParam = new RegExp('(?:[\?&]|&amp;)CKEditorFuncNum=([^&]+)', 'i') ;
						var match = window.location.search.match(reParam) ;
						return (match && match.length > 1) ? match[1] : '' ;
					})(), fm.convAbsUrl(file.url));
					fm.destroy();
					window.close();
				},
				'height': '100%'
			});
		</script>
		
	</body>
</html>
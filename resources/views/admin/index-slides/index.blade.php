@extends('admin.layout')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{route('admin.index-slides.index')}}">Index Slides</a>
	</li>
</ol>
<h1>Index Slides</h1>
<hr>			

@include('admin.global-partials.system-messages')

<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Index Slides

		<div class="btn-group btn-group-sm float-right" id="list-menu">
			<button type="button" class="btn btn-secondary" data-action="change-order">Change Order</button>
			<a class="btn btn-secondary" href="{{route('admin.index-slides.add')}}">
				<i class="fa fa-plus"></i>
				Add Slide
			</a>
		</div>
		<form action="{{route('admin.index-slides.reorder')}}" method="post" id="save-order-form" class="btn-group btn-group-sm float-right" style="display: none;">
			{{csrf_field()}}
			<input name="order_ids" value="" type="hidden">
			<button type="button" class="btn btn-secondary" data-action="cancel-change-order">Cancel</button>
			<button type="submit" class="btn btn-success">Save Order</button>
		</form>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="records-table" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>#</th>
						<th>Photo</th>
						<th>Status</th>
						<th>Title</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($indexSlides as $indexSlide)
					<tr data-id="{{$indexSlide->id}}">
						<td>{{$indexSlide->id}}</td>
						<td style="width: 200px;">
							@if(\Storage::disk('public')->exists('/index-slides/' . $indexSlide->photo_filename))
							<img 
							style="max-width: 200px;"
							class="img-fluid img-thumbnail" 
							src="{{\Storage::disk('public')->url('/index-slides/' . $indexSlide->photo_filename)}}" 
							alt="placeholder">
							@endif
						</td>
						<td class="text-center">
							@if($indexSlide->isEnabled())
							<i title="enabled" class="fa fa-check-circle text-success"></i>
							@else
							<i title="disabled" class="fa fa-ban text-danger"></i>
							@endif
						</td>
						<td>{{$indexSlide->title}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a 
									class="btn btn-secondary"
									href="{{route('admin.index-slides.edit', ['id' => $indexSlide->id])}}"
									title="edit"
								><i class="fa fa-pencil"></i></a>
								@if($indexSlide->isEnabled())
								<button 
									class="btn btn-secondary" 
									title="disable" 
									data-action="disable"
									data-id="{{$indexSlide->id}}"
								>
									<i class="fa fa-ban"></i>
								</button>
								@else
								<button 
									class="btn btn-secondary" 
									title="enable" 
									data-action="enable"
									data-id="{{$indexSlide->id}}"
								>
									<i class="fa fa-check-circle"></i>
								</button>
								@endif
								<button 
									class="btn btn-secondary" 
									title="delete" 
									data-action="delete"
									data-id="{{$indexSlide->id}}"
								>
									<i class="fa fa-trash"></i>
								</button>
							</div>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
</div>


<form method="post" action="{{route('admin.index-slides.delete')}}" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete slide on Index slider?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</form>
<form method="post" action="{{route('admin.index-slides.enable')}}" class="modal fade" id="enable-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Enable Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to enable slide on Index slider?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check-circle"></i>
					Enable
				</button>
			</div>
		</div>
	</div>
</form>
<form method="post" action="{{route('admin.index-slides.disable')}}" class="modal fade" id="disable-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Disable Slide</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to disable slide on Index slider?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-warning">
					<i class="fa fa-ban"></i>
					Disable
				</button>
			</div>
		</div>
	</div>
</form>
@endsection

@push('footer_javascript')
<script src="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script>
	$('#records-table').on('click', '[data-action="delete"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var deletePopup = $('#delete-record-modal');
		
		deletePopup.find('[name="id"]').val(id);
		
		deletePopup.modal('show');
	});
	
	$('#records-table').on('click', '[data-action="enable"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var enablePopup = $('#enable-record-modal');
		
		enablePopup.find('[name="id"]').val(id);
		
		enablePopup.modal('show');
	});
	
	$('#records-table').on('click', '[data-action="disable"]', function(e) {
		
		e.preventDefault();
		
		var target = $(this);
		
		var id = target.attr('data-id');
		
		var disablePopup = $('#disable-record-modal');
		
		disablePopup.find('[name="id"]').val(id);
		
		disablePopup.modal('show');
	});
	
	
	
	$('[data-action="change-order"]').on('click', function(e) {
		e.preventDefault();
		e.stopPropagation();
		
		
		$('#records-table tbody').sortable({
			'update': function(e, ui) {

				var ids = $(this).sortable('toArray', {
					'attribute': 'data-id'
				});

				$('#save-order-form [name="order_ids"]').val(ids.join(','));
			}
		});
		
		
		//set the initial order
		var ids = $('#records-table tbody').sortable('toArray', {
			'attribute': 'data-id'
		});

		$('#save-order-form [name="order_ids"]').val(ids.join(','));
		
		//show/hide sort form and list menu
		$('#list-menu').hide();
		
		$('#save-order-form').show();
	});
	
	$('[data-action="cancel-change-order"]').on('click', function(e) {
		e.preventDefault();
		e.stopPropagation();
		
		$('#list-menu').show();
		
		$('#save-order-form').hide();
		
		//restore old ordering
		$('#records-table tbody').sortable('cancel');
		
		//remove sortable functionality
		$('#records-table tbody').sortable('destroy');
	});
	
	
	
	
</script>
@endpush

@push('head_links')
<link href="{{url('/skins/admin/vendor/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

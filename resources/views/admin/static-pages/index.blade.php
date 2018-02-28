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
		
</ol>
<h1>Static Pages</h1>
<hr>			

@include('admin.global-partials.system-messages')

<hr>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Static Pages

		<div class="btn-group btn-group-sm float-right" id="list-menu">
			<button type="button" class="btn btn-secondary" data-action="change-order">Change Order</button>
			<a class="btn btn-secondary" 
                           href="{{route('admin.static-pages.add',[
                           'parentId'=> !empty($parentPage) ? $parentPage->id : 0
                           
                               ])}}">
                       
				<i class="fa fa-plus"></i>
				Add Static page
			</a>
		</div>
		<form action="{{route('admin.static-pages.reorder')}}" method="post" id="save-order-form" class="btn-group btn-group-sm float-right" style="display: none;">
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
						<th>Status</th>
						<th>Title</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($staticPages as $staticPage)
					<tr data-id="{{$staticPage->id}}">
						<td>{{$staticPage->id}}</td>
						<td class="text-center">
							@if($staticPage->isEnabled())
							<i title="enabled" class="fa fa-check-circle text-success"></i>
							@else
							<i title="disabled" class="fa fa-ban text-danger"></i>
							@endif
						</td>
						<td>
							<a href="{{route('admin.static-pages.index', ['parentId' => $staticPage->id])}}">
							{{$staticPage->title}}
							</a>
						</td>
						<td class="text-center">
							<div class="btn-group">
								<a 
									class="btn btn-secondary"
                                                                        href="{{$staticPage->frontendUrl()}}"
                                                                        target='_blank'
									title="preview"
								><i class="fa fa-search-plus"></i></a>
								<a 
									class="btn btn-secondary"
									href="{{route('admin.static-pages.edit', ['id' => $staticPage->id])}}"
									title="edit"
								><i class="fa fa-pencil"></i></a>
								@if($staticPage->isEnabled())
								<button 
									class="btn btn-secondary" 
									title="disable" 
									data-action="disable"
									data-id="{{$staticPage->id}}"
								>
									<i class="fa fa-ban"></i>
								</button>
								@else
								<button 
									class="btn btn-secondary" 
									title="enable" 
									data-action="enable"
									data-id="{{$staticPage->id}}"
								>
									<i class="fa fa-check-circle"></i>
								</button>
								@endif
								<button 
									class="btn btn-secondary" 
									title="delete" 
									data-action="delete"
									data-id="{{$staticPage->id}}"
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


<form method="post" action="{{route('admin.static-pages.delete')}}" class="modal fade" id="delete-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Static page</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to delete Static page?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</form>
<form method="post" action="{{route('admin.static-pages.enable')}}" class="modal fade" id="enable-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Enable Static page</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to enable Static page?
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
<form method="post" action="{{route('admin.static-pages.disable')}}" class="modal fade" id="disable-record-modal" tabindex="-1" role="dialog" aria-hidden="true">
	{{csrf_field()}}
	<input type="hidden" name="id" value="">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Disable Static page</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Are you sure you want to disable Static page?
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

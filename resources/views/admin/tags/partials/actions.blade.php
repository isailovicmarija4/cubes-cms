<div class="btn-group">
	<a 
		class="btn btn-secondary"
		href="{{route('admin.tags.edit', ['id' => $tag->id])}}"
		title="edit"
	><i class="fa fa-pencil"></i></a>

	<button 
		class="btn btn-secondary" 
		title="delete" 
		data-action="delete"
		data-id="{{$tag->id}}"
	>
		<i class="fa fa-trash"></i>
	</button>
</div>
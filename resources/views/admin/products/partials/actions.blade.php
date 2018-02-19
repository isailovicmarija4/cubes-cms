<div class="btn-group">
	<a 
		class="btn btn-secondary"
		href="{{route('admin.products.edit', ['id' => $product->id])}}"
		title="edit"
	><i class="fa fa-pencil"></i></a>

	<button 
		class="btn btn-secondary" 
		title="delete" 
		data-action="delete"
		data-id="{{$product->id}}"
	>
		<i class="fa fa-trash"></i>
	</button>
</div>
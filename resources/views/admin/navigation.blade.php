<ul class="navbar-nav navbar-sidenav" id="sideMenu">
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
		<a class="nav-link" href="{{route('admin.dashboard')}}">
			<i class="fa fa-fw fa-dashboard"></i>
			<span class="nav-link-text">Dashboard</span>
		</a>
	</li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Static pages">
		<a class="nav-link" href="{{route('admin.static-pages.index')}}">
			<i class="fa fa-fw fa-newspaper"></i>
			<span class="nav-link-text">Static pages</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Index Slides">
		<a class="nav-link" href="{{route('admin.index-slides.index')}}">
			<i class="fa fa-fw fa-photo"></i>
			<span class="nav-link-text">Index Slides</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="File Manager">
		<a class="nav-link" href="{{route('admin.filemanager.index')}}">
			<i class="fa fa-fw fa-dashboard"></i>
			<span class="nav-link-text">File Manager</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
		<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#products-submenu" data-parent="#sideMenu">
			<i class="fa fa-fw fa-barcode"></i>
			<span class="nav-link-text">Products</span>
		</a>
		<ul class="sidenav-second-level collapse" id="products-submenu">
			<li>
				<a class="active" href="{{route('admin.products.index')}}">Products</a>
			</li>
			<li>
				<a href="{{route('admin.product-categories.index')}}">Categories</a>
			</li>
			<li>
				<a href="{{route('admin.product-groups.index')}}">Groups</a>
			</li>
			<li>
				<a href="{{route('admin.product-brands.index')}}">Brands</a>
			</li>
		</ul>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tags">
		<a class="nav-link" href="{{route('admin.tags.index')}}">
			<i class="fa fa-fw fa-tags"></i>
			<span class="nav-link-text">Tags</span>
		</a>
	</li>
	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
		<a class="nav-link" href="{{route('admin.users.index')}}">
			<i class="fa fa-fw fa-id-card"></i>
			<span class="nav-link-text">Users</span>
		</a>
	</li>
</ul>
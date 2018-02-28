@extends('front.layout')

@section('head_title', $staticPage->title)

@section('content')		
<div id="highlighted">
	<div class="container">
		<div class="header">
			<h1 class="page-title">
				<span>
					{{$staticPage->title}}
				</span>
			</h1>
		</div>
	</div>
</div>

		<div id="content" class="demos">
			<div class="container">
				<ul class="breadcrumb">
                                    @foreach($staticPage->breadcrumbs() as $breadcrumbPage)
					<li><a href="{{$breadcrumbPage->frontendUrl()}}">{{$breadcrumbPage->short_title}}</a></li>
                                        @endforeach
					
				</ul>
				<div class="row">
					<div class="col-md-8 blog-post">
						<div class="media">
							<img 
								src="/skins/front/img/portfolio/enkel-home-blue.png"
								alt="{{$staticPage->title}}" 
								class="media-object" />
							
							<div class="media-body">
								<h1 class="title media-heading">{{$staticPage->title}}</h1>
								<!-- Meta details -->
								<p class="lead">{{$staticPage->description}}</p>
								
								<div class="content-body">
									{{$staticPage->body}}
								</div>	
							</div>
						</div>
					</div>
					<!--Sidebar-->
					<div class="col-md-4 sidebar sidebar-right">
						<div class="inner">
							<div class="block">
								
								<ul class="nav nav-list secondary-nav">
                                                                    @foreach($staticPage->childPages()->enabled()->get() as $childPage)
									<li>
                                                                            <a href="{{$childPage->frontendUrl()}}">{{$childPage->short_title}}</a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
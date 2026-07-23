<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

      
	<meta property="og:title" content="HM BUILDERS & SUPPLIERS (PVT) LTD">
	<meta property="og:description" content="We Build Your Future">
	<meta property="og:image" content="{{asset('images/fav.png')}}">
	<meta property="og:url" content="https://builders.hmgroup.lk/">
	<title>HM BUILDERS & SUPPLIERS (PVT) LTD</title>
	<link rel="icon" type="image/png" href="images/fav.png">

    @php $page='home';  @endphp
    @include('header') 
	
	<section class="hero-wrap hero-wrap-2" style="background-image:  url('{{ asset('images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="{{route('main')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>MODERN PLANS <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-3 bread">MODERN PLANS</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Our Global Work Industries</span>
					<h2 class="mb-4">Latest Plans</h2>
				</div>
			</div>
			<div class="row">

				@foreach ($projectarrs as $projectarr)
				<div class="col-md-4">
					<div class="project">
						<a href="{{route('project.images', ['id' => $projectarr->id])}}" class="img d-flex align-items-center" style="background-image: url({{ asset("image/$projectarr->image") }});">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">{{$projectarr->type}}</span>
							<h3>{{$projectarr->title}}</h3>
							<p><span class="fa fa-map-marker mr-1"></span> {{$projectarr->location}}</p>
						</div>
					</div>
				</div>
				@endforeach

				{{-- <div class="col-md-4">
					<div class="project">
						<a href="images/project-1.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-1.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="images/project-2.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-2.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="images/project-3.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-3.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="project">
						<a href="images/project-4.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-4.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="images/project-5.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-5.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="project">
						<a href="images/project-6.jpg" class="img image-popup d-flex align-items-center" style="background-image: url(images/project-6.jpg);">
							<div class="icon d-flex align-items-center justify-content-center mb-5"><span class="fa fa-plus"></span></div>
						</a>
						<div class="text">
							<span class="subheading">Building</span>
							<h3>Building A Condominium</h3>
							<p><span class="fa fa-map-marker mr-1"></span> San Francisco, California, USA</p>
						</div>
					</div>
				</div> --}}
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						@if ($paginator->hasPages())
							<ul>
								{{-- Previous Page Link --}}
								@if ($paginator->onFirstPage())
									<li class="disabled"><span>&laquo;</span></li>
								@else
									<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
								@endif

								{{-- Pagination Elements --}}
								@for ($i = 1; $i <= $paginator->lastPage(); $i++)
									@if ($i == $paginator->currentPage())
										<li class="active"><span>{{ $i }}</span></li>
									@else
										<li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
									@endif
								@endfor

								{{-- Next Page Link --}}
								@if ($paginator->hasMorePages())
									<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
								@else
									<li class="disabled"><span>&raquo;</span></li>
								@endif
							</ul>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('footer') 
	</html>
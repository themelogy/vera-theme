@extends('layouts.master')

@section('content')
    @include('partials.home.sliders.3')
		
		@if($page = Page::findBySlug('arac-kiralama'))
	    <section class="page-section" style="padding:30px 0 0 0; text-align:justify;">
        <div class="container">
			<div class="row">
				<div class="col-md-12">
				<h1 class="text-center">{{ $page->meta_title }}</h1>
				{!! $page->body !!}
				</div>
			</div>
		</div>
		</section>
		@endif

    @include('partials.cars.tabs')

    @if('salatalık'==1)
        @include('partials.home.blog')

        @include('partials.home.slogans')

        @include('partials.home.about-us')

        @include('partials.home.testimonials')

        @include('partials.cars.tabs')

        @include('partials.home.counter')

        @include('partials.home.faq')

        @include('partials.cars.search')

        @include('partials.home.newsletters')

        @include('partials.home.customer-service')

        @include('partials.home.contact-us')

    @endif
@endsection
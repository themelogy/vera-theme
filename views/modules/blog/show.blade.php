@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ $post->title }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('blog.show') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <div class="content-area">

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">

                    @include('blog::partials.sidebar')

                    <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">

                            <article class="post-wrap">
                                <div class="post-media">
                                    <a href="{{ $post->present()->firstImage(null,370,'resize',80) }}" data-gal="prettyPhoto"><img style="width:auto;height:250px;" src="{{ $post->present()->firstImage(null,370,'resize',80) }}" alt=""></a>
                                </div>
                                <div class="post-header">
                                    <h2 class="post-title"><a href="{{ $post->url }}">{{ $post->title }}</a></h2>
                                    <div class="post-meta"><a href="#">{{ $post->author->fullname }}</a> / {{ $post->created_at->formatLocalized('%d %B %Y') }} / <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></div>
                                </div>
                                <div class="post-body">
                                    <div class="post-excerpt">
                                        <p>{!! $post->content !!}</p>
                                    </div>
                                </div>
                            </article>


                    </div>
                    <!-- /CONTENT -->

                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->
		
		@includeIf('partials.cars.slider')

    </div>
@endsection
@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-center">
        <div class="container">
            <div class="page-header">
                <h1>{{ $page->title }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('page') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">
            {!! $page->body !!}
        </div>
    </section>
    <!-- /PAGE -->
@stop

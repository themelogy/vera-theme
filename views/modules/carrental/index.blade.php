@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::theme.rental cars') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.index') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')
    {!! Form::open(['route'=>['carrental.reservation'], 'method'=>'put']) !!}
    {!! Form::hidden('car_id', Request::get('car_id')) !!}
    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">
                <!-- CONTENT -->
                <div class="col-md-9 content car-listing" id="content">

                    @foreach($cars as $car)
                        <div class="thumbnail no-border no-padding thumbnail-car-card clearfix">
                            <div class="media">
                                <a class="media-link" data-gal="prettyPhoto" href="{{ $car->present()->firstImage(740,440,'fit',80) }}">
                                    <img src="{{ $car->present()->firstImage(370,220,'fit',80) }}" alt="{{ $car->fullname }}"/>
                                    <span class="icon-view"><strong><i class="fa fa-eye"></i></strong></span>
                                </a>
                            </div>
                            <div class="caption">
                                <h4 class="caption-title"><a href="#">{{ $car->fullname }}</a></h4>
                                <h5 class="caption-title-sub">{{ trans('themes::theme.price', ['price'=>$car->prices->price6]) }}</h5>
                                <div class="caption-text">
                                    {{ $car->description }}
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <td><i class="fa fa-user"></i> {{ $car->series->person }}</td>
                                            <td><i class="fa fa-suitcase"></i> {{ $car->series->baggage }}</td>
                                            <td><i class="fa icon-body"></i> {{ $car->present()->body_type }}</td>
                                            <td><i class="fa icon-fuel"></i> {{ $car->present()->fuel_type }}</td>
                                            <td><i class="fa icon-gear"></i> {{ $car->present()->transmission }}</td>
                                            <td class="buttons">
                                                <button type="submit" name="car_id" class="btn btn-theme" value="{{ $car->id }}">{{ trans('themes::theme.buttons.rent') }}</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                @endforeach

                <!-- Pagination -->
                    <div class="pagination-wrapper">
                        @if(count($cars)>0)
                            {!! $cars->render('carrental::pagination.default') !!}
                        @endif
                    </div>
                    <!-- /Pagination -->

                </div>
                <!-- /CONTENT -->

                <!-- SIDEBAR -->
                <aside class="col-md-3 sidebar" id="sidebar">
                    <!-- widget -->
                    <div class="widget shadow widget-find-car">
                        <h4 class="widget-title">{{ trans('themes::theme.reservation.date') }}</h4>
                        <div class="widget-content">
                            <!-- Search form -->
                            <div class="form-search light">
                                @include('carrental::partials.reservation-date')
                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>
                    <!-- /widget -->

                    <!-- widget helping center -->
                    <div class="widget shadow widget-helping-center">
                        <h4 class="widget-title">{{ trans('themes::theme.call us now') }}</h4>
                        <div class="widget-content">
                            <p>Size yardımcı olabilmek için elimizden geleni yapacağız.</p>
                            <h5 class="widget-title-sub">{{ setting('theme::phone') }}</h5>
                            <p><a href="mailto:{!! HTML::email(setting('theme::email')) !!}">{!! HTML::email(setting('theme::email')) !!}</a></p>
                        </div>
                    </div>
                    <!-- /widget helping center -->
                </aside>
                <!-- /SIDEBAR -->

            </div>
        </div>
    </section>
    {!! Form::close() !!}
    <!-- /PAGE WITH SIDEBAR -->
@endsection
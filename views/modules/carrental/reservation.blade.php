@extends('layouts.master')

@section('breadcrumbs')
    <section class="page-section breadcrumbs text-right">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('themes::carrental.titles.car', ['car'=>$car->fullname]) }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('carrental.reservation') !!}
        </div>
    </section>
@endsection

@section('content')

    <section class="page-section with-sidebar sub-page">
        <div class="container">
            <div class="row">

                <div class="col-md-9 content" id="content">

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i> {{ trans('themes::theme.car.information') }}</h3>
                    <div class="car-big-card alt">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="@if(count($car->images)>1) owl-carousel img-carousel @endif">
                                    @foreach($car->present()->images(600,null,'resize',80,6) as $image)
                                        <div class="item">
                                            <a class="btn btn-zoom" href="{{ $image }}" data-gal="prettyPhoto"><i class="fa fa-arrows-h"></i></a>
                                            <a href="{{ $image }}" data-gal="prettyPhoto"><img class="img-responsive" src="{{ $image }}" alt=""/></a>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($car->images)>1)
                                    <div class="row car-thumbnails">
                                        @foreach($car->present()->images(70,70,'fit',80,6) as $image)
                                            <div class="col-xs-2 col-sm-2 col-md-{{ 12/$loop->count }}"><a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [{{ $loop->iteration-1 }},300]);"><img src="{{ $image }}" alt=""/></a></div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="car-details">
                                    <div class="list">
                                        <ul>
                                            <li class="title"><h2>{{ $car->fullname }}</h2></li>
                                            <li><i class="fa fa-user"></i> {{ $car->series->person }}</li>
                                            <li><i class="fa fa-suitcase"></i> {{ $car->series->baggage }}</li>
                                            <li><i class="fa icon-gear"></i> {{ $car->present()->transmission }}</li>
                                            <li><i class="fa icon-body"></i> {{ $car->present()->body_type }}</li>
                                            <li><i class="fa icon-fuel"></i> {{ $car->present()->fuel_type }}</li>
                                        </ul>
                                    </div>
                                    <div class="price">
										@if(isset($reservation->daily_price))
                                        <strong>{{ $reservation->daily_price }}</strong> <span>TL / 1 Günlük</span><br/>
										@else
										<strong>{{ $car->prices->price1 }}</strong> <span>TL / 1 Günlük</span><br/>	
										@endif
										@if(isset($reservation->total_day))
                                        Toplam {{ $reservation->total_day }} gün için {{ number_format($reservation->daily_price * $reservation->total_day, 2) }} TL
										@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="page-divider half transparent"/>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>Rezervasyon Bilgileri</h3>
                    @if (Session::has('success'))
                        <div class="alert alert-success fade in alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    {!! Form::open(['route'=>'carrental.reservation.create', 'method'=>'post']) !!}
                    {!! Form::hidden('car_id', Request::get('car_id')) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("tc_no") ? ' has-error' : '' }}">
                                {!! Form::text('tc_no', old('tc_no'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.tc_no')]) !!}
                                {!! $errors->first("tc_no", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("first_name") ? ' has-error' : '' }}">
                                {!! Form::text('first_name', old('first_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.first_name')]) !!}
                                {!! $errors->first("first_name", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has("last_name") ? ' has-error' : '' }}">
                                {!! Form::text('last_name', old('last_name'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.last_name')]) !!}
                                {!! $errors->first("last_name", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("phone") ? ' has-error' : '' }}">
                                {!! Form::text('phone', old('phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.phone')]) !!}
                                {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("mobile_phone") ? ' has-error' : '' }}">
                                {!! Form::text('mobile_phone', old('mobile_phone'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.mobile_phone')]) !!}
                                {!! $errors->first("mobile_phone", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-4 m-top-10">
                            <div class="form-group{{ $errors->has("email") ? ' has-error' : '' }}">
                                {!! Form::text('email', old('email'), ['class' => 'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>trans('carrental::reservations.form.email')]) !!}
                                {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <h3 class="block-title alt"><i class="fa fa-angle-down"></i>EK İSTEKLERİNİZ</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::textarea('requests', old('requests'), ['class'=>'alt form-control', 'data-toggle'=>'tooltip', 'placeholder'=>'İstekleriniz']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="overflowed reservation-now">
                        <div class="checkbox pull-left">
						<div class="form-group @if ($errors->has('g-recaptcha-response')) has-error @endif">
							{!! Captcha::display() !!}
							<span class="help-block"><small>{!! $errors->first('g-recaptcha-response') !!}</small></span>
						</div>
                        </div>
                        {!! Form::submit('REZERVASYON YAP', ['class'=>'btn btn-theme pull-right btn-reservation-now']) !!}
                        <a class="btn btn-theme pull-right btn-cancel btn-theme-dark" href="#">İPTAL</a>
                    </div>
                    {!! Form::close() !!}

                </div>


                <aside class="col-md-3 sidebar" id="sidebar">
                    <!-- widget detail reservation -->
                    <div class="widget shadow widget-find-car">
                        <h4 class="widget-title">Rezervasyon Tarihi</h4>
                        <div class="widget-content">
                            <!-- Search form -->
                            <div class="form-search light">
                                {!! Form::open(['route'=>'carrental.reservation.update', 'method'=>'put']) !!}
                                {!! Form::hidden('car_id', Request::get('car_id')) !!}
                                @include('carrental::partials.reservation-date')

                                <button name="reservationUpdate" type="submit" class="btn btn-submit btn-theme btn-theme-dark btn-block" value="1">FİYATLARI GÜNCELLE</button>
                                {!! Form::close() !!}

                            </div>
                            <!-- /Search form -->
                        </div>
                    </div>

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

            </div>
        </div>
    </section>

@endsection

@push('js_inline')
{!! Captcha::script() !!}
@endpush
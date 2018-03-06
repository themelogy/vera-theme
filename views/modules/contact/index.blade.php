@extends('layouts.master')

@section('breadcrumbs')
    <!-- BREADCRUMBS -->
    <section class="page-section breadcrumbs text-center">
        <div class="container">
            <div class="page-header">
                <h1>{{ trans('contact::contacts.title.contacts') }}</h1>
            </div>
            {!! Breadcrumbs::renderIfExists('contact') !!}
        </div>
    </section>
    <!-- /BREADCRUMBS -->
@endsection

@section('content')

    <!-- PAGE -->
    <section class="page-section color">
        <div class="container">

            <div class="row">

                <div class="col-md-4">
                    <div class="contact-info">

                        <h2 class="block-title"><span>{{ trans('themes::theme.contact us') }}</span></h2>

                        <div class="media-list">
                            <div class="media">
                                <i class="pull-left fa fa-home"></i>
                                <div class="media-body">
                                    <strong>{{ trans('themes::theme.contact.address') }}</strong><br>
                                    {!! setting('theme::address') !!}
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-phone"></i>
                                <div class="media-body">
                                    <strong>{{ trans('themes::theme.contact.phone') }}:</strong><br>
                                    {{ setting('theme::phone') }}<br>
									<strong>Mobile:</strong><br>
                                    {{ setting('theme::phone2') }}
                                </div>
                            </div>
                            <div class="media">
                                <i class="pull-left fa fa-envelope-o"></i>
                                <div class="media-body">
                                    <strong>{{ trans('themes::theme.contact.email') }}:</strong><br>
                                    {{ HTML::email(setting('theme::email')) }}
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    {{ trans('themes::theme.contact.information') }}
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <strong>{{ trans('themes::theme.contact.customer service') }}:</strong><br>
                                    <a href="mailto:{!! HTML::email(setting('theme::email')) !!}">{!! HTML::email(setting('theme::email')) !!}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8 text-left">

                    <h2 class="block-title"><span>{{ trans('themes::theme.contact.form') }}</span></h2>

                    <!-- Contact form -->
                    @include('contact::form')
                    <!-- /Contact form -->

                </div>

            </div>

        </div>
    </section>
    <!-- /PAGE -->

    <section style="height: 300px;">
        @gmap('300px', '16', 'img/favicon.png')
    </section>

@stop
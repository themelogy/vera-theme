<!DOCTYPE html>
<html lang="{!! LaravelLocalization::getCurrentLocale() !!}">
<head>
@include('partials.metadata')
</head>
<body id="home" class="wide">

<div class="wrapper">

    @include('partials.header')

    <div class="content-area">

        @yield('breadcrumbs')

        @yield('content')

    </div>

    @include('partials.footer.dark-nosocial')

</div>

@include('partials.scripts')

</body>
</html>
<!-- Head Libs -->
{!! Theme::script('vendor/jquery/jquery-1.11.1.min.js') !!}
{!! Theme::script('vendor/modernizr.custom.js') !!}

<!--[if lt IE 9]>
{!! Theme::script('vendor/html5shiv.js') !!}
{!! Theme::script('vendor/respond.min.js') !!}
<![endif]-->

<!-- JS Global -->
{!! Theme::script('vendor/bootstrap/js/bootstrap.min.js') !!}
{!! Theme::script('vendor/bootstrap-select/js/bootstrap-select.min.js') !!}
{!! Theme::script('vendor/superfish/js/superfish.min.js') !!}
{!! Theme::script('vendor/prettyphoto/js/jquery.prettyPhoto.js') !!}
{!! Theme::script('vendor/owl-carousel2/owl.carousel.min.js') !!}
{!! Theme::script('vendor/jquery.sticky.min.js') !!}
{!! Theme::script('vendor/jquery.easing.min.js') !!}
{!! Theme::script('vendor/jquery.smoothscroll.min.js') !!}
{!! Theme::script('vendor/swiper/dist/js/swiper.min.js') !!}
{!! Theme::script('vendor/datetimepicker/js/moment-with-locales.min.js') !!}
{!! Theme::script('vendor/datetimepicker/js/bootstrap-datetimepicker.min.js') !!}

<!-- JS Page Level -->
{!! Theme::script('js/theme.js') !!}

<script type="text/javascript"> WebFontConfig = {
        google: {
            families: [
                'Roboto:400,700,300:latin-ext',
                'Raleway:700,800,900,400,300:latin-ext',
                'Open+Sans:400,300,600,700,800'
            ]
        }
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

@stack('js_inline')

<?php if (!isset($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'Speed Insights') === false): ?>
{!! $googleAnalytics !!}
<?php endif; ?>
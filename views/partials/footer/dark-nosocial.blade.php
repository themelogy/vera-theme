<footer class="footer-dark">
    <div class="footer-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget widget-contact">
                        <div class="logo m-bot-10">
                            <a href="{{ url(locale()) }}"><img src="{!! Theme::url('img/logo.svg') !!}" alt="{{ setting('themes::company-name') }}"/></a>
                        </div>
                        <address class="pull-left m-top-5 p-lft-40">
                            <strong>{!! setting('theme::company-name') !!}</strong><br>
                            {!! setting('theme::address') !!}<br>
                            <abbr title="Telefon">T:</abbr> {{ setting('theme::phone') }}<br/>
                            <abbr title="Mobil">M:</abbr> {{ setting('theme::phone2') }}<br/>
                            <abbr title="Email">E:</abbr> {{ HTML::email(setting('theme::email')) }}
                        </address>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
						<div class="col-md-5">
							<div class="row">
								<div class="col-md-6">
									<div class="widget widget-links">
										<h4>Kurumsal</h4>
										{!! Menu::render('corporate', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
									</div>
								</div>
								<div class="col-md-6">
									<div class="widget widget-links">
										<h4>Kiralama Hizmetleri</h4>
										{!! Menu::render('services', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
									</div>
								</div>
							</div>
						</div>
                        <div class="col-md-4">
                            <div class="widget widget-links">
                                <h4>Araç Kiralama</h4>
                                {!! Menu::render('rental', \Themes\Rentacar\Presenter\FooterMenuLinksPresenter::class) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <div class="newsletters">
                                    <p>Gelişmelerden Haberdar Olmak İçin Lütfen E-Posta Hesabınızı Ekleyiniz.</p>
                                    <input name="email" type="text" placeholder="E-posta adresi" />
                                    <button type="submit" class="button">></button>
                                </div>
                                <hr/>
                                <p>Bizi takip edin</p>
                                <ul class="social-icons">
                                    <li><a href="{{ setting('theme::facebook') }}" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li>
                                        <a href="{{ setting('theme::twitter') }}" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li>
                                        <a href="{{ setting('theme::pinterest') }}" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <li>
                                        <a href="{{ setting('theme::google') }}" class="google"><i class="fa fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-meta dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright">{{ trans('themes::theme.copyrights') }}&copy; {{ setting('theme::company-name') }}</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>

@push('css_inline')
<style>
.footer-dark .widget-links ul li {
	margin-bottom: 5px !important;
	line-height:16px !important;
	list-style-type: circle;
	list-style-position: outside;
}
</style>
@endpush
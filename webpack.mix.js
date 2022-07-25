let mix = require('laravel-mix');

let dist = 'public/themes/vera';
let node_modules = `${__dirname}/node_modules`;
let vendor = `${dist}/vendor`;
let resources = `${__dirname}/resources`;
let resourceAssets = `${resources}/assets`;

if(!isProduction) {
    mix
        .sourceMaps(true, 'source-map')
        .webpackConfig({devtool: 'source-map'});
}

mix
    .sass(`${node_modules}/bootstrap-sass/assets/stylesheets/_bootstrap.scss`, `${dist}/css/bootstrap.min.css`)
    .sass(`${__dirname}/resources/assets/sass/theme/theme.scss`, `${dist}/css/theme.min.css`);

mix.copy(`${__dirname}/resources/assets`, `${__dirname}/assets`);

mix.combine([`${resourceAssets}/js/theme.js`], `${dist}/js/theme.min.js`);

if(!isProduction) {
    mix
        .browserSync({
        proxy: 'dev.veraarackiralama.com',
        files: [__dirname + '/**/*.*']
    });
} else {
    mix.version();
}
const mix = require('laravel-mix');
const {VuetifyPlugin} = require('webpack-plugin-vuetify')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.ts('resources/js/app.ts', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).webpackConfig({
    plugins: [
        new VuetifyPlugin({autoImport: true}),
    ],
});

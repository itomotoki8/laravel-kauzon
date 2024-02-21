const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/home.js", "public/js")
    .js("resources/js/item.js", "public/js")
    .js("resources/js/cart.js", "public/js")
    .js("resources/js/create.js", "public/js")
    .js("resources/js/review.js", "public/js")
    .js("resources/js/category.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ]);
mix.webpackConfig({
    watchOptions: {
        ignored: /node_modules/,
    },
});

const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

let fs = require("fs");

let getDirs = function (dir) {
    // get all 'files' in this directory
    // filter directories
    return fs.readdirSync(dir).filter((file) => {
        return fs.statSync(`${dir}/${file}`).isDirectory();
    });
};

let getFiles = function (dir) {
    // get all 'files' in this directory
    // filter directories
    return fs.readdirSync(dir).filter((file) => {
        return fs.statSync(`${dir}/${file}`).isFile();
    });
};

getDirs("resources/js").forEach(function (dirpath) {
    getFiles("resources/js/" + dirpath).forEach(function (filepath) {
        mix.js(
            "resources/js/" + dirpath + "/" + filepath,
            "public/js/" + dirpath + "/" + filepath
        );
    });
});

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [require("postcss-import"), require("tailwindcss"), require("autoprefixer")]
);

mix.postCss("resources/css/custom.css", "public/css");

'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename'),
    argv = require('yargs').argv,
    env = require('./env');

var ASSET_FOLDER = env.DIR_THEME + 'assets/';
var SCSS_SRC = ['./' + env.DIR_SRC + 'styles/screen.scss'];

// SCSS Compiation
gulp.task('scss', function() {
    var compiled = gulp.src(SCSS_SRC)
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('screen.css'));

    // Minify if production
    if(argv.prod) {
        compiled.pipe(minify())
            .pipe(rename({
                basename: 'screen',
                extname: '.min.css'
            }));
    }

    compiled.pipe(gulp.dest(ASSET_FOLDER + 'styles'));
});
'use strict';

var ASSET_FOLDER = '../public/content/themes/nicolesippola/assets/';
var SCSS_SRC = ['./styles/screen.scss'];

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minifyCss = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    rename = require('gulp-rename');

gulp.task('scss', function() {
    gulp.src(SCSS_SRC)
        .pipe(sass().on('error', sass.logError))
        // .pipe(minifyCss())
        .pipe(concat('screen.css'))
        .pipe(rename({
            basename: 'screen',
            extname: '.min.css'
        }))
        .pipe(gulp.dest(ASSET_FOLDER + 'styles'));
});
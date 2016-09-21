var gulp = require('gulp');

var requireDir = require('require-dir');
requireDir('./tasks');

gulp.task('default', ['scripts', 'styles'], function () {
    gulp.watch(['src/scripts/**/*.js', 'src/vendor/**/*.js'], ['scripts']);
    gulp.watch('src/styles/**/*.{sass,scss}', ['styles']);
});
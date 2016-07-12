'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var sourceMaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');
var minify = require('gulp-minify');
var concat = require('gulp-concat');

gulp.task('sass', function() {
	gulp.src('./src/css/*.scss')
		.pipe(sass())
		.pipe(sourceMaps.init())
		.pipe(cleanCSS())
		.pipe(sourceMaps.write())
		.pipe(rename('style.css'))
		.pipe(gulp.dest('./public/css'));
});

gulp.task('js', function() {
	gulp.src('./src/js/**/*.js')
		.pipe(concat('app.js'))
		.pipe(minify())
		.pipe(gulp.dest('./public/js'));
})

gulp.task('watch', function() {
	gulp.watch('./src/css/**/*', ['sass']);
	gulp.watch('./src/js/**/*', ['js']);
});

gulp.task('default', ['sass']);
'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var sourceMaps = require('gulp-sourcemaps');
var watch = require('gulp-watch');

gulp.task('sass', function() {
	gulp.src('./src/css/*.scss')
		.pipe(sass())
		.pipe(sourceMaps.init())
		.pipe(cleanCSS())
		.pipe(sourceMaps.write())
		.pipe(rename('style.css'))
		.pipe(gulp.dest('./public/css'));
});

gulp.task('watch', function() {
	gulp.watch('./src/css/**/*', ['sass'])
});

gulp.task('default', ['sass']);
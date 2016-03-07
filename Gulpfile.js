"use strict";

var gulp = require('gulp'),
		gutil = require('gulp-util'),
		sass = require('gulp-sass'),
		autoprefixer = require('gulp-autoprefixer'),
		sourcemaps = require('gulp-sourcemaps'),
		concat = require('gulp-concat'),
		uglify = require('gulp-uglify'),
		watch = require('gulp-watch'),
		connect = require('gulp-connect'),
		livereload = require('gulp-livereload');

var path = {
	  SASS: './assets/scss/style.scss',
	  JS: [
			'./assets/js/jquery/jquery.min.js',
	  	'./assets/js/vendor/*.js',
	  	'./assets/js/*.js'
	  	]
};

// STYLE SHEETS - SASS COMMANDS --------------------------------------------------------------------

gulp.task('sass', function() {
	gulp.src(path.SASS)
		.pipe(sourcemaps.init())
		.pipe(sass({style: 'expanded', lineNumbers : true }).on('error', sass.logError))
		.pipe(autoprefixer('last 2 versions', 'safari 5', 'ie8', 'ie9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(concat('style.css'))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./'));
});

gulp.task('sass-out', function() {
	gulp.src(path.SASS)
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(autoprefixer('last 2 versions', 'safari 5', 'ie8', 'ie9', 'opera 12.1', 'ios 6', 'android 4'))
		.pipe(concat('style.css'))
		.pipe(gulp.dest('./'));
});

// JAVASCRIPT - JS COMMANDS --------------------------------------------------------------------

gulp.task('js', function() {
	gulp.src(path.JS)
	.pipe(sourcemaps.init())
	.pipe(concat('mashup.js'))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest('./js'));
});

gulp.task('js-out', function() {
	gulp.src(path.JS)
		.pipe(concat('mashup.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./js'));
});

gulp.task('default', ['sass', 'js']);

gulp.task('outbound', ['sass-out', 'js-out']);

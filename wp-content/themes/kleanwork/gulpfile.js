'use strict';

// REQUISITES

var

gulp		= require('gulp'),
sass		= require('gulp-sass'),
uglify		= require('gulp-uglify'),
concat		= require('gulp-concat'),
watch		= require('gulp-watch'),
jade		= require('gulp-jade'),
prefix      = require('gulp-autoprefixer'),
minify      = require('gulp-minify-css'),
gulpif      = require('gulp-if'),
plumber     = require('gulp-plumber'),
beep        = require('beepbeep'),
colors      = require('colors')
;


// PATHS

var
SOURCE		= 'source/',
BOWER		= 'bower_components/',
CSS			=  SOURCE + 'sass/',
JS 			=  SOURCE + 'js/',
DIST 		= '.'
;

// Build variables
var isPrototype         = true;
var browserSyncEnabled  = true;
var debug               = true;
var ugly                = true;
var beepbeep            = true;



// TASKS

gulp.task('default', ['vendor', 'css', 'jade', 'js'], function(){
	gulp.watch(CSS + '**/*.scss', ['css']);
	gulp.watch(SOURCE + '*.jade', ['jade']);
	gulp.watch(JS + '*.js', ['js']);
})

gulp.task('vendor', function() {
	var FILES = [
		//BOWER + 'jquery/dist/jquery.js',
		BOWER + 'jquery-validation/dist/jquery.validate.js'
	];
	gulp.src(FILES)
		.pipe(concat('vendor.js'))
		.pipe(uglify())
		.pipe(gulp.dest(DIST))
})

gulp.task('js', function() {
	var FILES = [
		BOWER + 'jquery-validation/dist/jquery.validate.js',
		JS + 'libraries/*.js',
		JS + 'before/*.js',
		JS + '*.js'
	];
	gulp.src(FILES)
		.pipe(concat('main.js'))
		.pipe(uglify().on('error', function (error) { console.warn(error.message);  }))
		.pipe(gulp.dest(DIST))
})

gulp.task('css', function() {
	var FILES = [
		CSS + '*.scss'
	];
	gulp.src(FILES)
	    .pipe(plumber(function (error) {
	        if(beepbeep) {
	          beep();
	        }
	        console.log('[sass]'.bold.magenta + ' There was an issue compiling Sass\n'.bold.red);
	        console.log('Error:'.bold + error.message);
	        this.emit('end');
	    }))
	    .pipe(sass({ errLogToConsole: true }))
	    .pipe(prefix("last 1 version", "> 1%", "ie 9"))
	    .pipe(gulpif(ugly, minify().on('error', function (error) { console.warn(error.message); })))
		.pipe(sass())
			.on('error', sass.logError)
		.pipe(gulp.dest(DIST))
})

gulp.task('jade', function() {
	var FILES = [
		SOURCE + '*.jade'
	];
	gulp.src(FILES)
		.pipe(jade({
			pretty: true
		}))
		.pipe(gulp.dest(DIST))
})
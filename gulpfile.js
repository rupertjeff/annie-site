;(function (gulp, rimraf, _, concat, sass, autoprefixer, cssMinify, imports, jsMinify)
{
	"use strict";

	gulp.task('styles', function ()
	{
		return gulp.src('./scss/**/*.scss')
			.pipe(sass())
			.pipe(autoprefixer())
			.pipe(cssMinify())
			.pipe(gulp.dest('./public/css'));
	});

	gulp.task('scripts', function ()
	{
		return gulp.src('./js/*.js')
			.pipe(imports())
			.pipe(jsMinify())
			.pipe(gulp.dest('./public/js'));
	});

	gulp.task('files', function ()
	{
		var fileList = {
			'./public/css/vendor/bootstrap/css': [
				'./bower/bootstrap/dist/css/**/*'
			],
			'./public/css/vendor/bootstrap/fonts': [
				'./bower/bootstrap/dist/fonts/**/*'
			],

			'./public/js/vendor/angular': [
				'./bower/angular/angular.js',
				'./bower/angular/angular.min.js',
				'./bower/angular/angular.min.js.map',
				'./bower/angular-resource/angular-resource.js',
				'./bower/angular-resource/angular-resource.min.js',
				'./bower/angular-resource/angular-resource.min.js.map',
				'./bower/angular-route/angular-route.js',
				'./bower/angular-route/angular-route.min.js',
				'./bower/angular-route/angular-route.min.js.map'
			],
			'./public/js/vendor/angular/file-upload': [
				'./bower/ng-file-upload/angular-file-upload.js',
				'./bower/ng-file-upload/angular-file-upload.min.js',
				'./bower/ng-file-upload/angular-file-upload-shim.js',
				'./bower/ng-file-upload/angular-file-upload-shim.min.js'
			]
		};

		_.each(fileList, function (files, path)
		{
			gulp.src(files)
				.pipe(gulp.dest(path));
		});
	});

	gulp.task('watch', ['styles', 'scripts']);

	gulp.task('default', ['watch']);
}(require('gulp'), require('gulp-rimraf'), require('underscore'), require('gulp-concat'),
	require('gulp-ruby-sass'), require('gulp-autoprefixer'), require('gulp-minify-css'),
	require('gulp-imports'), require('gulp-ng-annotate')));

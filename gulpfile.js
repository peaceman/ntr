var gulp = require('gulp');
var mainBowerFiles = require('main-bower-files');
var elixir = require('laravel-elixir');
var filter = require('gulp-filter');
var notify = require('gulp-notify');
require('laravel-elixir-bower');

gulp.task('bower-fonts', function () {
	return gulp.src(mainBowerFiles())
		.pipe(filter(['**/*.eot', '**/*.woff', '**/*.ttf']))
		.pipe(gulp.dest('public/build/fonts'))
		.pipe(notify({
			title: 'copied fonts from bower packages'
		}));
});

elixir(function (mix) {
	mix.bower()
		.less('main.less')
		.version(['css/main.css', 'css/vendor.css', 'js/vendor.js'])
		.queueTask('bower-fonts')
		.routes()
		.events();
});

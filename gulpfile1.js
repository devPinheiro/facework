var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCss = require('gulp-clean-css');
 
 
gulp.task('pack-js', function () {	
	return gulp.src(['public/assets/vendors/base/vendors.bundle.js', 'public/assets/demo/default/base/scripts.bundle.js', 'public/js/owl.carousel.min.js', 'public/js/typeahead.js','public/js/script.js' ])
		.pipe(concat('bundle.js'))
		.pipe(gulp.dest('public/build/js'))
		.pipe(minify({
			ext: {
				min: '.js'
			},
			noSource: true
		}))
		.pipe(gulp.dest('public/build/js'));
});
 
gulp.task('pack-css', function () {	
	return gulp.src(['public/assets/demo/default/base/style.bundle.css', 'public/assets/vendors/base/vendors.bundle.css', 'public/css/fontawesome-all.css', 'public/css/cover.css'])
		.pipe(concat('stylesheets.css'))
		.pipe(gulp.dest('public/build/css'))
		.pipe(cleanCss())
		.pipe(gulp.dest('public/build/css'));
});
 
gulp.task('default', ['pack-js', 'pack-css']);
var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCss = require('gulp-clean-css');
 
 
gulp.task('pack-js', function () {	
	return gulp.src([ 'public/js/owl.carousel.min.js', 'public/js/typeahead.js','public/js/script.js' ])
		.pipe(minify({
			ext: {
				min: '.js'
			},
			noSource: true
		}))
		.pipe(gulp.dest('public/build/js'));
});
 
gulp.task('pack-css', function () {	
	return gulp.src([ 'public/css/fontawesome-all.css', 'public/css/cover.css'])
		.pipe(cleanCss())
		.pipe(gulp.dest('public/build/css'));
});
 
gulp.task('default', ['pack-js', 'pack-css']);
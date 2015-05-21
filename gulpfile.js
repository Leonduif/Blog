var gulp       = require('gulp');
var sass       = require('gulp-sass');
var livereload = require('gulp-livereload');

gulp.task('sass', function() {
	gulp.src('./assets/sass/**/*.scss')
		.pipe(sass()).on('error', sass.logError)
		.pipe(gulp.dest('dist'))
		.pipe(livereload());
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('assets/sass/**/*.scss', ['sass']);
});
// Modules
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var livereload   = require('gulp-livereload');
var autoprefixer = require('gulp-autoprefixer');

// Files
var sassFiles  = './assets/sass/**/*.scss';

gulp.task('sass', function() {
	gulp.src(sassFiles)
		.pipe(sass()).on('error', sass.logError)
		.pipe(autoprefixer({
			browser: ['last 2 versions'],
			cascade: false
		}))
		.pipe(gulp.dest('dist'))
		.pipe(livereload());
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch(sassFiles, ['sass']);
});
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function(){
	gulp.src('assets/scss/main.scss')
		.pipe(sass())
		.pipe(autoprefixer('last 10 version'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('watch', function(){
	gulp.watch('assets/scss/**/*.scss', ['css']);
});

gulp.task('default', ['css', 'watch']);
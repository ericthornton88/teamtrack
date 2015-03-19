var gulp = require('gulp');
var concat = require('gulp-concat'); //combines files
var uglify = require('gulp-uglify'); //minification
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer'); //automatically adds webkit
 
gulp.task('sass', function () {
    gulp.src('./public/scss/*.scss')
        .pipe(sass())
        .pipe(autoprefixer({
                browsers: ['last 5 versions'],
                cascade: false
            }))
        .pipe(gulp.dest('./public/css'));
});


gulp.task('scripts', function() {

  gulp.src([
		'./bower_components/jquery/dist/jquery.js',
  		'./bower_components/handlebars/handlebars.js',
  		'./public/js/src/*.js'
  	])
    .pipe(concat('build.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js/'));

});

// Rerun the task when a file changes
gulp.task('watch', function() {
	gulp.watch(['./public/js/src/*.js'], ['scripts']);
	gulp.watch(['./public/scss/*.scss'], ['sass']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'scripts', 'sass']);


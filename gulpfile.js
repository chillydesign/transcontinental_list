var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minify = require('gulp-minify');



gulp.task('heya', function() {
  console.log('I live! Gulp is alive!');
});


gulp.task('sass', function(){
  return gulp.src('scss/style.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(autoprefixer({
        cascade: false
    }))
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('css'))
});





// Run all Gulp tasks and serve application
gulp.task('default', ['heya', 'sass'], function() {
  gulp.watch('scss/*.scss', ['sass']);
//  gulp.watch('js/*.js', ['compress']);
});

// Run all Gulp tasks and serve application

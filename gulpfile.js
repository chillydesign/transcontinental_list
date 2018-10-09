var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var minify = require('gulp-minify');



gulp.task('heya', function(done) {
  console.log('I live! Gulp is alive!');
      done();
});


gulp.task('sass', function(done){
  return gulp.src('scss/style.scss')
    .pipe(sass()) // Converts Sass to CSS with gulp-sass
    .pipe(autoprefixer({
        cascade: false
    }))
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('css'));
    done();

});





// Run all Gulp tasks and serve application
gulp.task('default', gulp.series( 'sass', 'heya'), function() {
  gulp.watch('scss/*.scss', ['sass']);
//  gulp.watch('js/*.js', ['compress']);
});

// Run all Gulp tasks and serve application

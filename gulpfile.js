var gulp          = require('gulp');
var sass          = require('gulp-sass');
var browserSync   = require('browser-sync').create();
var sourcemaps    = require('gulp-sourcemaps');

gulp.task('sass',function(){
  return gulp.src('lib/scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('lib/css/'))
    .pipe(browserSync.reload({
      stream: true
    }))
});

gulp.task('watch',['browserSync','sass'],function(){
  gulp.watch('lib/scss/**/*.scss',['sass']);
});

gulp.task('browserSync',function(){
  browserSync.init({
    proxy: 'janaspicka.local'
  })
});
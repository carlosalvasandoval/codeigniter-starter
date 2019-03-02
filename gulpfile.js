var gulp = require('gulp');
var concat = require('gulp-concat');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');
var del = require('del');
var clean = require('gulp-clean');
const jsValidate = require('gulp-jsvalidate');
var runSequence = require('run-sequence');
const babel = require('gulp-babel');

var paths = {
  sass: ['assets/scss/**/*.scss'],
  css: ['assets/css/**/*.css'],
  js: ['assets/js/**/*.js'],
  dist: ['assets/dist/'],
  root: ['./']
};

gulp.task('sass', function (done) {
  gulp.src(paths.sass)
    .pipe(sass())
    .on('error', sass.logError)
    //.pipe(concat('dist.min.css'))
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(gulp.dest(paths.dist + 'css/'))
    .on('end', done);
});


gulp.task('sass_dev', function (done) {
  gulp.src(paths.sass)
    .pipe(sass())
    .on('error', sass.logError)
   // .pipe(concat('dist.min.css'))
    .pipe(gulp.dest(paths.dist + 'css/'))
    .on('end', done);
});

gulp.task('css', function (done) {
  gulp.src(paths.css)
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(gulp.dest(paths.dist + 'css/'))
    .on('end', done);
});


gulp.task('css_dev', function (done) {
  gulp.src(paths.css)
    .pipe(gulp.dest(paths.dist + 'css/'))
    .on('end', done);
});


gulp.task('js', ['clean_js'], function () {
  return gulp.src(paths.js)
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(
      uglify(
        {
          mangle: true // change variable name
        }
      ).on('error', function (e) {
      console.log(e);
    })

      )
    .pipe(gulp.dest(paths.dist + 'js/'));
});

gulp.task('js_dev', ['clean_js'], function () {
  return gulp.src(paths.js)
    .pipe(gulp.dest(paths.dist + 'js/'));
});

gulp.task('build', function (callback) {
  runSequence('clean_js',
    'js', 'validate_js',
    callback);
});
gulp.task('build_dev', function (callback) {
  runSequence('clean_js',
    'js_dev', 'validate_js',
    callback);
});


gulp.task('clean_js', function () {
  return gulp.src(paths.dist + 'js/', {read: false})
    .pipe(clean());
});

gulp.task('validate_js', () =>
  gulp.src('assets/dist/js/**/*.js')
    .pipe(jsValidate())
);

gulp.task('watch', ['build', 'sass', 'css'], function () {
  gulp.watch([paths.js, paths.sass, paths.css], ['build', 'sass', 'css']);
});

gulp.task('watch_dev', ['build_dev', 'sass_dev', 'css_dev'], function () {
  gulp.watch([paths.js, paths.sass, paths.css], ['build_dev', 'sass_dev', 'css_dev']);
});
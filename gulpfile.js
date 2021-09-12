

var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-minify-css');

gulp.task('js', function(){
    gulp.src([
       'resources/assets/js/plugins/*.js',
         'resources/assets/js/shopify.js', 
         'resources/assets/js/admin/*.js',
         'resources/assets/js/init.js'
      ])

    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'));
 });
 
 gulp.task('css', function(){
    gulp.src([
       'resources/assets/css/plugins/plugins.css',
       'resources/assets/css/admin/*.css'
      ])

    .pipe(concat('all.css'))
    .pipe(minify())
    .pipe(gulp.dest('public/css/'));
 });
 
 gulp.task('default',['js','css'],function(){
 });
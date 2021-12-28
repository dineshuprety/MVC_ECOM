

var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-minify-css');

gulp.task('js', function(){
    gulp.src([
       'resources/assets/js/plugins/*.js',
         'resources/assets/js/shopify.js', 
         'resources/assets/js/admin/*.js',
         'resources/assets/js/home/*.js',
         'resources/assets/js/pages/*.js',
         'resources/assets/js/init.js'
      ])

    .pipe(concat('all.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'));
 });
 
//  gulp.task('plugins', function(){
//     gulp.src([
//        'resources/assets/css/plugins/plugins.css'    
//       ])

//     .pipe(concat('plugins.css'))
//     .pipe(minify())
//     .pipe(gulp.dest('public/css/'));
//  });

 gulp.task('home', function(){
   gulp.src([
      'resources/assets/css/plugins/plugins.css',
      'resources/assets/css/home/vendor/modifie.min.css',
      'resources/assets/css/home/style.min.css',
      'resources/assets/css/home/responsive.min.css'
      
     ])

   .pipe(concat('home.css'))
   .pipe(minify())
   .pipe(gulp.dest('public/css/'));
});

gulp.task('admin', function(){
   gulp.src([
      'resources/assets/css/admin/*.css'
      
     ])

   .pipe(concat('admin.css'))
   .pipe(minify())
   .pipe(gulp.dest('public/css/'));
});
 
 gulp.task('default',['js','home','admin'],function(){
 });
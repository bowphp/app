var gulp     = require('gulp');
var csslint  = require('gulp-csslint');
var cssmin   = require('gulp-cssmin');
var uglify   = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sass     = require('gulp-sass');

gulp.task('compile-sass', function () {
    gulp.src('assets/sass/*')
        .pipe(sass())
        .pipe(csslint())
        .pipe(cssmin())
        .pipe(gulp.dest('public/css/'));
});

gulp.task('images-min', function() {
    return gulp.src('assets/images/*')
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('public/images'));
});

gulp.task('compile-js', function () {
    return gulp.src('assets/js/**')
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

gulp.task('watch-js', function() {
    gulp.watch('assets/js/*', ['compile-js']);
});

gulp.task('watch-sass', function() {
    gulp.watch('assets/sass/*', ['compile-sass']);
});

gulp.task('watch', function() {
    gulp.watch('assets/js/*', ['compile-js']);
    gulp.watch('assets/sass/*', ['compile-sass']);
});

gulp.task('default', ['compile-js', 'compile-sass', 'images-min']);
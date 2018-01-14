var gulp     = require('gulp');
var csslint  = require('gulp-csslint');
var cssmin   = require('gulp-cssmin');
var uglify   = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
var sass     = require('gulp-sass');
var babel    = require('gulp-babel');

gulp.task('prod', () => {
    gulp.src('components/assets/sass/app.scss')
        .pipe(sass())
        .pipe(csslint())
        .pipe(cssmin())
        .pipe(gulp.dest('public/css/'));

    gulp.src('components/assets/img/**')
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('public/img'));

    gulp.src('components/assets/js/**')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'));
});

gulp.task('dev', () => {
    gulp.src('components/assets/sass/app.scss')
        .pipe(sass())
        .pipe(csslint())
        .pipe(cssmin())
        .pipe(gulp.dest('public/css/'));

    gulp.src('components/assets/img/**')
        .pipe(imagemin({optimizationLevel: 5}))
        .pipe(gulp.dest('public/img'));

    gulp.src('components/assets/js/**')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(gulp.dest('public/js'));
});

gulp.task('watch', function() {
    gulp.watch('components/assets/js/**', ['compile-js']);
    gulp.watch('components/assets/sass/**', ['compile-sass']);
});

gulp.task('default', ['prod', 'dev', 'watch']);
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var concat = require('gulp-concat');

gulp.task('js', function () {
    return gulp.src('./resources/themes/admin/assets/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/themes/admin/js'));
});

gulp.task('custom_js', function(){
    return gulp.src('./resources/themes/admin/assets/cjs/**/*.js')
        .pipe(concat('custom_app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/assets/themes/admin/js'));
});

gulp.task('css', function () {
    return gulp.src('./resources/themes/admin/assets/css/**/*.css')
        .pipe(cleanCSS())
        .pipe(gulp.dest('./public/assets/themes/admin/css'));
});

gulp.task('fonts', function() {
    return gulp.src('./resources/themes/admin/assets/font/**/*')
        .pipe(gulp.dest('./public/assets/themes/admin/font'));
});

gulp.task('images', function(){
    return gulp.src('./resources/themes/admin/assets/images/**/*')
        .pipe(gulp.dest('./public/assets/themes/admin/images'));
});

gulp.task('default', ['js', 'css', 'fonts', 'images', 'custom_js']);

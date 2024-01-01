const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));

gulp.task('sass', function () {
    return gulp.src('./assets/scss/style.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./assets/css'));
});

gulp.task('watch-sass', function () {
    gulp.watch('./assets/scss/style.scss', gulp.series('sass'));
});
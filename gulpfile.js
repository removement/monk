const gulp = require('gulp');
const sass = require('gulp-sass')(require('node-sass'));

gulp.task('sass', function () {
    return gulp.src('./assets/scss/**/*.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('./assets/css'));
});

gulp.task('watch-sass', function () {
    gulp.watch('./assets/scss/**/*.scss', gulp.series('sass'));
});
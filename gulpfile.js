var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', done => {
  gulp.src('*.scss')
  .pipe(sass({outputStyle: 'expanded'}))
  .pipe(gulp.dest('./'))
  .pipe(autoprefixer({
    browsers: ['last 2 versions'],
  }))
  done()
});

gulp.task('log', done => {
  console.log("DONE")
  done()
});

gulp.task('watch', () => {
  gulp.watch(['*.scss','./scss/*.scss'], gulp.series('sass','log'));
})

gulp.task("default",
  gulp.series(
    'watch'
  )
);

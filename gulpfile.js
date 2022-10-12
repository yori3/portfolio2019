var gulp = require('gulp');
const dartSass = require('gulp-dart-sass');
var autoprefixer = require('gulp-autoprefixer');

const paths = {
  scss: {
    src: 'src/scss/*.scss', // コンパイル対象
    dest: 'dist/css/' // 出力先
  }
}

gulp.task('sass', done => {
  gulp.src(paths.scss.src)
  .pipe(dartSass({outputStyle: 'expanded'}))
  .pipe(gulp.dest(paths.scss.dest))
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
  gulp.watch(['*.scss', paths.scss.src], gulp.series('sass','log'));
})

gulp.task("default",
  gulp.series(
    'watch'
  )
);

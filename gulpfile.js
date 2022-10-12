var gulp = require('gulp');
const dartSass = require('gulp-dart-sass');
var autoprefixer = require('gulp-autoprefixer');

const paths = {
  scss: {
    src: 'scss/*.scss', // コンパイル対象
    dest: './css/' // 出力先
  }
}

gulp.task('sass', done => {
  gulp.src('./scss/*.scss')
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
  gulp.watch(['*.scss','./scss/*.scss'], gulp.series('sass','log'));
})

gulp.task("default",
  gulp.series(
    'watch'
  )
);

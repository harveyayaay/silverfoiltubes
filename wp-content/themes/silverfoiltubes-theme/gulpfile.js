"use strict";

// Load plugins
const del = require('del');
const gulp = require('gulp');
const sass = require('gulp-sass');
const shell = require('gulp-shell');
const babel = require('gulp-babel');
const rename = require('gulp-rename');
const concat = require('gulp-concat-util');
const uglify = require('gulp-uglify');
const cssnano = require('gulp-cssnano');
const imagemin = require('gulp-imagemin');
const sourcemaps = require('gulp-sourcemaps');
const pngquant = require('imagemin-pngquant');
const autoprefixer = require('gulp-autoprefixer');
const runSequence = require('run-sequence').use(gulp);
const inlinesource = require('gulp-inline-source');
const pxtorem = require('gulp-pxtorem');
const gcmq = require('gulp-group-css-media-queries');

var paths = {
  scripts: [
    './assets/js/components/*.js',
  ],
  sass: [
    './assets/css/**/*.scss',
  ]
};

// CSS task
function css() {
  return gulp
    .src(paths.sass)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(gcmq())
    .pipe(autoprefixer({ Browserslist: ['last 2 versions', 'ie >= 9'] }))
    .pipe(concat('main.css'))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./assets/css'));
}

// Transpile, concatenate and minify scripts
function scripts() {
  return (
    gulp
      .src(paths.scripts)
      .pipe(sourcemaps.init())
      .pipe(concat('main.js'))
      .pipe(gulp.dest('./assets/js'))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('./assets/js'))
  );
}

// Watch files
function watchFiles() {
  gulp.watch(paths.sass, gulp.series(css));
  gulp.watch(paths.scripts, gulp.series(scripts));
}


// define complex tasks
const js = gulp.series(scripts);
const build = gulp.series(gulp.parallel(css, js));
const watch = gulp.series(watchFiles);

// export tasks
exports.css = css;
exports.js = js;
exports.build = build;
exports.watch = watch;
exports.default = gulp.series(watchFiles);

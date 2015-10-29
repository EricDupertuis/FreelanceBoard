'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var filesize = require('gulp-filesize');
var minifyCss = require('gulp-minify-css');
var plumber = require('gulp-plumber');

gulp.task('sass', function () {
    gulp.src('./src/WebRobot/FreelanceBundle/Resources/assets/sass/**/*.scss')
        .pipe(plumber())
        .pipe(filesize())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(gulp.dest('./src/WebRobot/FreelanceBundle/Resources/public/css'))
        .pipe(filesize());
});

gulp.task('sass:watch', function () {
    gulp.watch('./src/WebRobot/FreelanceBundle/Resources/assets/sass/**/*.scss', ['sass']);
});
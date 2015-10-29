'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function () {
    gulp.src('./src/WebRobot/FreelanceBundle/Resources/Assets/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./src/WebRobot/FreelanceBundle/Resources/public/css'));
});

gulp.task('sass:watch', function () {
    gulp.watch('./src/WebRobot/FreelanceBundle/Resources/Assets/sass/**/*.scss', ['sass']);
});
'use strict';
const gulp = require('gulp');
const mocha = require('gulp-mocha');

const PATHS = {
    //only worrying about the lambda for now
    js: ['lambda/**/*.js']
};

gulp.task('test', () => {
    return gulp.src(PATHS.js, {read: false})
        .pipe(mocha({reporter: 'spec'}));
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['test']);
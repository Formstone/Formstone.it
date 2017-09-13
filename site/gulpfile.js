var fs             = require('fs');
var moment         = require('moment');
var gulp           = require('gulp');
var autoprefixer   = require('gulp-autoprefixer');
var cleanCSS       = require('gulp-clean-css');
var clip           = require('gulp-clip-empty-files');
var header         = require('gulp-header');
var include        = require('gulp-include');
var jshint         = require('gulp-jshint');
var less           = require('gulp-less');
var modernizr      = require('gulp-modernizr');
var plumber        = require('gulp-plumber');
var replaceInclude = require('gulp-replace-include');
var sequence       = require('gulp-sequence');
var uglify         = require('gulp-uglify');

var lessImportNPM  = require('less-plugin-npm-import');

// Vars
var pkg = require('./package.json');
var date = moment().format('YYYY-MM-DD');
var comment = '/*! <%= pkg.name %> v<%= pkg.version %> [<%= filename %>] <%= date %> |' +
  ' <%= pkg.license %> License | <%= pkg.homepage_short %> */\n';

// Less
gulp.task('styles', function() {
  return gulp.src(['./css/src/*.less'])
    .pipe(plumber())
    .pipe(less({
      plugins: [ new lessImportNPM() ],
      globalVars: pkg.vars
    }))
    .pipe(autoprefixer({
      browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie >= 10']
    }))
    .pipe(cleanCSS({
      compatibility: 'ie10'
    }))
    .pipe(clip())
    .pipe(gulp.dest('./css'));
});

// JS
gulp.task('scripts', function() {
  return gulp.src('./js/src/*.js')
    .pipe(plumber())
    .pipe(include({
      includePaths: [
        __dirname,
        __dirname + "/node_modules",
        __dirname + "/js/src"
      ]
    }))
    .pipe(replaceInclude({
      prefix: '@',
      global: pkg.vars
    }))
    .pipe(jshint())
    .pipe(uglify())
    .pipe(gulp.dest('./js'));
});

// Modernizr
gulp.task('modernizr', function () {
  return gulp.src(['./js/*.js', './css/*.css'])
    .pipe(plumber())
    .pipe(modernizr({
      'tests': [
        'js',
        'touchevents'
      ],
      'options': [
        'setClasses',
        'addTest',
        'testProp',
        'fnBind'
      ]
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./js'));
});

// Tasks

gulp.task('default', sequence(
  ['styles', 'scripts'],
  'modernizr'
));

gulp.task('watch', ['default'], function() {
  gulp.watch('./css/src/**/*.less', ['styles']);
  gulp.watch('./js/src/**/*.js', ['scripts']);
});

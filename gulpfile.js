var fs             = require('fs');
var moment         = require('moment');
var gulp           = require('gulp');
var autoprefixer   = require('gulp-autoprefixer');
var jsbeautify     = require('gulp-beautify');
var cssbeautify    = require('gulp-cssbeautify');
var clean          = require('gulp-clean');
var cleanCSS       = require('gulp-clean-css');
var clip           = require('gulp-clip-empty-files');
var header         = require('gulp-header');
var htmlbeautify   = require('gulp-html-beautify');
var include        = require('gulp-include');
var jshint         = require('gulp-jshint');
var less           = require('gulp-less');
var modernizr      = require('gulp-modernizr');
var rename         = require('gulp-rename');
var replaceInclude = require('gulp-replace-include');
var sequence       = require('gulp-sequence');
var uglify         = require('gulp-uglify');
var zetzer         = require('gulp-zetzer');
// var buildDocs      = require('./tasks/docs.js');

var lessImportNPM  = require('less-plugin-npm-import');

// Vars
var pkg = require('./package.json');
var date = moment().format('YYYY-MM-DD');
var comment = '/*! <%= pkg.name %> v<%= pkg.version %> [<%= filename %>] <%= date %> |' +
  ' <%= pkg.license %> License | <%= pkg.homepage_short %> */\n';

// Less
gulp.task('styles', function() {
  return gulp.src(['./assets/css/src/*.less'])
    .pipe(less({
      plugins: [ new lessImportNPM() ],
      globalVars: pkg.src.vars
    }))
    .pipe(autoprefixer({
      browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie >= 10']
    }))
    .pipe(cleanCSS({
      compatibility: 'ie10'
    }))
    .pipe(clip())
    .pipe(gulp.dest('./public/css'));
});

// JS
gulp.task('scripts', function() {
  return gulp.src('./assets/js/src/*.js')
    .pipe(include({
      includePaths: [
        __dirname,
        __dirname + "/node_modules",
        __dirname + "/assets/js/src"
      ]
    }))
    .pipe(replaceInclude({
      prefix: '@',
      global: pkg.src.vars
    }))
    .pipe(jshint())
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'));
});

// Modernizr
gulp.task('modernizr', function () {
  return gulp.src(['assets/js/*.js', 'assets/css/*.css'])
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
    .pipe(gulp.dest('public/js/'));
});

// Demo - HTML
gulp.task('zetzer', function(){
   return gulp.src('./site/pages/**/*.md')
    .pipe(zetzer({
      partials: './site/_templates/',
      templates: './site/_templates/',
      env: {
        title: 'Formstone',
        version: pkg.version
      }
    }))
    .pipe(rename(function(path) {
      path.extname = '.html'
    }))
    .pipe(htmlbeautify())
    .pipe(gulp.dest('./public'));
});

// Tasks

gulp.task('default', sequence(
  ['styles', 'scripts'],
  'modernizr',
  ['zetzer']
));

gulp.task('dev', ['default'], function() {
  gulp.watch('./assets/less/**/*.less', ['default']);
  gulp.watch('./assets/js/**/*.js', ['default']);
  gulp.watch('./site/**/*', ['default']);
});

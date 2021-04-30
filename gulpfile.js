var gulp = require("gulp");
var del = require("del");
var assetsFrontEnd = 'frontend/assets/';
var frontEnd = 'frontend/web/';

var clean = function (cb){
    del([
        frontEnd.concat("assets/*"),
        '!.gitignore'
    ]);
    cb();
}

var defaultTask = function (cb){

    gulp.watch(html.watch,['clean']);
    gulp.watch(tsSrc + '**/*.ts',['typescript']);
    gulp.watch(appSrc + 'css/*.css',['css']);
    gulp.watch(appSrc + '**/*.html',['html']);



    cb();
}


var copylibs = function (cb){
    return gulp
    .src([
        'node_modules/es6-shim/es6-shim.min.js',
        'node_modules/systemjs/dist/system-polyfills.js',
        'node_modules/angular2/bundles/angular2-polyfills.js',
        'node_modules/systemjs/dist/system.src.js',
        'node_modules/rxjs/bundles/Rx.js',
        'node_modules/angular2/bundles/angular2.dev.js'

    ])
    .pipe(gulp.dest(appSrc + 'js/lib/angular2'));
    cb();
}

var typescript = function (cb){

    return gulp
    .src(tsSrc + '**/*.ts')
    .pipe(sourcemaps.init())
    .pipe(typescript(tsConfig.compilerOptions))
    .pipe(sourcemaps.write("."))
    .pipe(gulp.dest(appSrc + 'js/'))

    cb();
}




exports.default = defaultTask;
exports.clean = clean;
exports.typescript = typescript;
exports.copylibs = copylibs;
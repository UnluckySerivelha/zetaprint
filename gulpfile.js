var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass')),
    browserSync = require('browser-sync').create(),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'),
    gutil = require('gulp-util'),
    ftp = require('vinyl-ftp'),
    concat = require('gulp-concat'),
    include = require('gulp-include'),
    minify = require('gulp-minify');

const ftpConfig = {
    host: 'pavel-dymok.myjino.ru',
    user: 'pavel-dymok_gulp',
    password: 'EQ253gTgi2BEJkb',
    parallel: 10,
    log: gutil.log,
};

var paths = {
    src: "src/",
    dist: "./",
    temp: "temp/",
    build: "build/",
};

gulp.task('scss', () => {
    return (
        gulp
            .src(paths.src + 'scss/*.scss')
            // .pipe(sourcemaps.init())
            .pipe(sass())
            .on("error", sass.logError)
            // .pipe(sourcemaps.write())
            .pipe(gulp.dest(paths.dist + 'css'))
            .pipe(browserSync.stream())
    );
});
gulp.task('build:scss', () => {
    return (
        gulp
            .src(paths.src + 'scss/*.scss')
            .pipe(sass())
            .on("error", sass.logError)
            .pipe(autoprefixer({
                overrideBrowserslist: ['last 25 versions'],
                cascade: false
            }))
            .pipe(cleanCSS({compatibility: "ie8", level: 2}))
            .pipe(gulp.dest(paths.build + 'css'))
    );
});


gulp.task('font', (done) => {
    return (gulp.src(paths.src + 'font/*')
        .pipe(gulp.dest(paths.dist + 'font/')))
        .pipe(browserSync.reload({stream: true}));
    done();
});

gulp.task('build:font', (done) => {
    return (gulp.src(paths.src + 'font/*')
        .pipe(gulp.dest(paths.build + 'font/')))
    done();
});

gulp.task('js', (done) => {
    return (gulp.src(paths.src + 'js/*.*')
        .pipe(include())
            .on('error', console.log)
        .pipe(gulp.dest(paths.dist + 'js/')))
        .pipe(browserSync.reload({stream: true}));
    done();
});
gulp.task('build:js', (done) => {
    return (gulp.src(paths.src + 'js/**/*.*')
        .pipe(include())
            .on('error', console.log)
        .pipe(gulp.dest(paths.build + 'js/')))
    done();
});

gulp.task('js-libs', (done) => {
    return (gulp.src(paths.src + 'js/vendor/*.*')
        .pipe(concat('libs.js'))
        .pipe(gulp.dest(paths.dist + 'js/')))
        .pipe(browserSync.reload({stream: true}));
    done();
});
gulp.task('build:js-libs', (done) => {
    return (gulp.src(paths.src + 'js/vendor/*.*')
        .pipe(concat('libs.js'))
        .pipe(minify())
        .pipe(gulp.dest(paths.build + 'js/')));
    done();
});


gulp.task('server', (done) => {
    browserSync.init({
        proxy: "http://zetaprint.local",
        notify: false
    });

    browserSync.watch(['*.php','include/*.php', 'js/*.js']).on('change', browserSync.reload);

    done()

});


gulp.task('placeInRoot', (done) => {
    return (gulp.src(paths.src + 'placeInRoot/**/*.*', {dot: true})
        .pipe(gulp.dest(paths.dist)))
    done();
});

gulp.task('build:placeInRoot', (done) => {
    return (gulp.src(paths.src + 'placeInRoot/**/*.*', {dot: true})
        .pipe(gulp.dest(paths.build + '')))
    done();
});


gulp.task('watch', (done) => {
    // gulp.watch([paths.src + 'scss/**/*.scss', paths.src + 'templates/**/*.html'], gulp.series('scss', 'inky'));
    gulp.watch(paths.src + 'scss/**/*.scss', gulp.series('scss'));
    gulp.watch(paths.src + 'js/**/*.js', gulp.series('js'));
    gulp.watch(paths.src + 'js/vendor/*.js', gulp.series('js-libs'));
    gulp.watch(paths.src + 'font/*', gulp.series('font'));
    done();

});

gulp.task('clean-ftp', function (cb) {
    var conn = ftp.create(ftpConfig);
    return conn.rmdir('/domains/' + paths.projectName + '.pdymok.ru/*', cb);
});

gulp.task('dev', gulp.series(gulp.parallel('scss', 'font', 'js', 'js-libs', 'server', 'watch')));
gulp.task('build', gulp.series( gulp.parallel('build:scss', 'build:js-libs', 'build:font', 'build:js')));
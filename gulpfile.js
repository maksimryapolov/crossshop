/*
*  Исходные скрипты расположены ./app/
*  Посде соборки ./build/
*
*  develop сборка gulp dev
*  production сборка gulp build
*
* */

let gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync').create(),
    uglify = require('gulp-uglify'),
    del = require('del'),
    concat = require('gulp-concat'),
    sass = require("gulp-sass");

function style(done)
{
    return gulp.src('./app/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            errorLogToConsole: true,
            outputStyle: "compressed"
        }))
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./dist/css/'))
        .pipe(browserSync.stream());

    done();
}

function watch ()
{
    browserSync.init({
        server: {
            baseDir: './'
        },
        port: 3000
    });

    gulp.watch('./app/scss/**/*.scss', style);
    gulp.watch('./app/js/**/*.js', script);
    gulp.watch('./*.html').on("change", browserSync.reload);
}

function clean ()
{
    return del(['./dist/*']);
}

function script ()
{
    return gulp.src(['node_modules/jquery/dist/jquery.js', "./app/js/owl.carousel.min.js", "./app/js/jquery.maskedinput.min.js", './app/js/main.js', './app/js/admin.js'])
        .pipe(concat('main.js'))
        .pipe(uglify({
            toplevel: true
        }))
        .pipe(gulp.dest("./dist/js/"))
        .pipe(browserSync.stream());
}

function images ()
{
    return gulp.src('./app/images/**')
        .pipe(gulp.dest("./dist/images/"));
}

function fonts ()
{
    return gulp.src('./app/fonts/**')
        .pipe(gulp.dest("./dist/fonts/"));
}

gulp.task('build', gulp.series(clean, gulp.parallel(style, script, images, fonts)));
gulp.task('dev', gulp.series('build', watch));


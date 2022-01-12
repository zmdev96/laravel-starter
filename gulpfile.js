// Include The Plugins


var gulp = require('gulp'),
    prefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    imagemin = require('gulp-imagemin'),
    minify = require('gulp-uglify'),
    rename = require('gulp-rename');


// Dashboard Css Task
gulp.task('css', async function(cbcss) {
    // Template
    gulp.src(['public/assets/dashboard/stage/sass/main.scss'])
        .pipe(sass({
            outputStyle: 'compressed'
        })) //expanded
        .pipe(prefix('last 2 versions'))
        .pipe(concat('app.min.css'))
        .pipe(gulp.dest('public/assets/dashboard/dist/css'))
    //auth
    gulp.src(['public/assets/dashboard/stage/sass/inc/pages/auth.scss'])
        .pipe(sass({
            outputStyle: 'compressed'
        })) //expanded
        .pipe(prefix('last 2 versions'))
        .pipe(concat('auth.min.css'))
        .pipe(gulp.dest('public/assets/dashboard/dist/css'))

    cbcss();
});


// Dashboard JS Task
gulp.task('js', async function(cbjs) {

    // All JS File In Directly Folder
    gulp.src(['public/assets/dashboard/stage/js/*.js'])
        .pipe(concat('app.min.js'))
        .pipe(minify())
        .pipe(gulp.dest('public/assets/dashboard/dist/js'))

    // Singel Page Js
    gulp.src(['public/assets/dashboard/stage/js/pages/*.js'])
        .pipe(minify())
        .pipe(rename({
            suffix: ".min"
        }))
        .pipe(gulp.dest('public/assets/dashboard/dist/js/pages'))

    cbjs();
});



// Dashboard Images Task
gulp.task('imgminify', async function() {
    return gulp.src('public/assets/dashboard/stage/images/*')
        .pipe(imagemin([
            imagemin.gifsicle({
                interlaced: true
            }),
            imagemin.mozjpeg({
                quality: 75,
                progressive: true
            }),
            imagemin.optipng({
                optimizationLevel: 5
            }),
            imagemin.svgo({
                plugins: [{
                    removeViewBox: true
                },
                    {
                        cleanupIDs: false
                    }
                ]
            })
        ]))
        .pipe(gulp.dest('public/assets/dashboard/dist/images'))
});


// Watch Task
gulp.task('watch', async function() {
    gulp.watch('public/assets/dashboard/stage/sass/**/*.scss', gulp.series('css'));
    gulp.watch('public/assets/dashboard/stage/js/**/*.js', gulp.series('js'));
    gulp.watch('public/assets/dashboard/stage/images/*', gulp.series('imgminify'));

});

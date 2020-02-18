const gulp = require('gulp');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const sourcemaps = require('gulp-sourcemaps');
const gulpif = require('gulp-if');
const argv = require('yargs').argv;
const debug = require('gulp-debug');
const rjs = require('gulp-requirejs');
const browserSync = require('browser-sync').create();
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');


sass.compiler = require('node-sass');


/*
VARS
 */

let env = {
    localUrl: 'http://era-digital.prj', // Прописать локальный адрес проекта (для BrowserSync)
    watch: {
        styles: [
            './resources/sass/**/*.sass',
            './resources/sass/**/*.scss',
            './public/fonts/icons/style.scss'
        ],
    },
    dest: {
        css: './public/css/'
    }

};


/*
FUNCTIONS
 */

let app = {
    sass: {
        common: [
            './resources/sass/*.sass'
        ],
        frontend: [
            './resources/sass/frontend/**/*.sass',
            './resources/sass/frontend/**/*.scss',
        ],
        backend: [
            './resources/sass/backend/**/*.sass',
            './resources/sass/backend/**/*.scss'
        ]
    }
};

app.compileStyles = function (paths, outputFileName) {
    return gulp.src(paths)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(gulpif(
            argv.prod,
                concat(outputFileName + '.min.css'),
                concat(outputFileName + '.css'),
                debug({title: 'concat'})
            )
        )
        .pipe(gulpif(
            argv.prod,
                cleanCSS({
                    level: 2})
            )
        )
        .pipe(autoprefixer({
            cascade: true
        }))
        .pipe(sourcemaps.write('.'))

        .pipe(gulp.dest(env.dest.css))
};


gulp.task('styles', done => {

    app.compileStyles(
        app.sass.common.concat(app.sass.frontend),
        'frontend'
    );

    app.compileStyles(
        app.sass.common.concat(app.sass.backend),
        'backend'
    );

    done();

});


gulp.task('img', done => {

    gulp.src('./resources/img/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./public/img/'))

    done();

});


gulp.task('webp', () =>
    gulp.src('./resources/img/**/*')
        .pipe(webp())
        .pipe(gulp.dest('./public/img/'))
);


/*
TASKS
 */

gulp.task('watch', function () {

    browserSync.init({
        proxy: env.localUrl,
        notify: false
    });

    gulp.watch(
        env.watch.styles,
        gulp.series('styles')
    )
        .on('change', browserSync.reload);
});

gulp.task('run', gulp.series('styles', 'watch'));


/*
COMMANDS
 */

// gulp styles [--prod]
// компилирует .sass файлы в .css [в .min.css]

// gulp run [--prod]
// сперва копилирует .sass в .css, затем запускает виртульный сервер и наблюдатель .sass-файлов
// наблюдатель компилирует файлы стилей и обновляет страницу

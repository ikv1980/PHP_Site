// Подключение всех плагинов
var gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create()


// ---------------------------------------------------------------------- Копирование html при изменении
function copyhtml(done) {
  gulp.src('app/*.html')
  .pipe (gulp.dest('public/'))
  done();
}

// ---------------------------------------------------------------------- Работа с SCSS
function sassToCSS(done) {
  gulp.src('app/scss/*.scss')
  .pipe(sass({
    outputStyle: 'compressed', /* (минификация css) */
    errorLogToConsole: true /* (Вывод ошибок в консоль) */
  }))
  .on('error', console.error.bind(console))
  .pipe(autoprefixer({
    ovverideBrowserlist: ['last 20 versions'],
    cascade: false
  }))
  .pipe(cleanCSS())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('public/css/'));
  done();
}

// ---------------------------------------------------------------------- Работа с CSS
function minify_css(done) {
  gulp.src('app/**/*.css')
  .pipe(autoprefixer({
    ovverideBrowserlist: ['last 20 versions'],
    cascade: false
  }))
  .pipe(cleanCSS())
  .pipe(gulp.dest('public/'))
  done();
}

// ---------------------------------------------------------------------- Минимизация js
function minify_js(done) {
  gulp.src('app/**/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('public/'))
  done();
}
// ---------------------------------------------------------------------- Старт сервера
function server(done) { 
  browserSync.init({
    server: 'public'
  })
  browserSync.watch('public/**/*').on('change', browserSync.reload)
  done();
};

// ---------------------------------------------------------------------- Watch-таск
function watchAll(done) {
  gulp.watch('app/**/*.css', minify_css);
  gulp.watch('app/**/*.scss', sassToCSS);
  gulp.watch('app/**/*.js', minify_js);
  gulp.watch('app/*.html', copyhtml);
  done();
}

// ---------------------------------------------------------------------- Создаем задачу по-умолчанию и вызываем сервер и watch таски параллельно
gulp.task('default', gulp.parallel(server, watchAll));

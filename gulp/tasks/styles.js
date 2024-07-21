const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const postcss = require("gulp-postcss");
const path = require("path");

const srcPath = path.resolve(__dirname, "../src");
const buildPath = path.resolve(srcPath, "build");

const isProduction = false;

const paths = {
	css: {
		src: [`${srcPath}/scss/site.scss`],
		dest: `${buildPath}/`,
	},
};

function buildStyles() {
	return gulp
		.src(paths.css.src)
		.pipe(sassGlob())
		.pipe(
			sass({
				outputStyle: isProduction ? "compressed" : "expanded",
				includePaths: ["node_modules"],
			}).on("error", sass.logError)
		)
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest(paths.css.dest));
}

function buildComponentStyles() {
	return gulp
		.src(paths.css.src)
		.pipe(sassGlob())
		.pipe(
			sass({
				outputStyle: isProduction ? "compressed" : "expanded",
				includePaths: ["node_modules"],
			}).on("error", sass.logError)
		)
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest(paths.css.dest));
}

gulp.task("styles", buildStyles);
gulp.task("component-styles", buildComponentStyles);

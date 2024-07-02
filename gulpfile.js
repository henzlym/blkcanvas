"use strict";

require("module-alias/register");
/**
 * Gulp Dependecies
 */
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const clean = require("gulp-clean");
const cleanCSS = require("gulp-clean-css");
const concat = require("gulp-concat");
const purgecss = require("gulp-purgecss");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const named = require("vinyl-named");
const webpack = require("webpack-stream");
const webpackCompiler = require("webpack");
const webpackConfig = require("./webpack.config");
const tap = require("gulp-tap");
const fs = require("fs");
const replace = require("gulp-replace");
// const bootstrapIcons = require('bootstrap-icons');

const isProduction = false;
const srcPath = `${__dirname}/src`;
const publicPath = `${srcPath}/public`;

const paths = {
	css: {
		src: [
			`${srcPath}/scss/site.scss`,
			`${srcPath}/scss/base.scss`,
			`${srcPath}/scss/templates/**/*.scss`,
			`${srcPath}/scss/components/**/*.scss`,
		],
		dest: `${publicPath}/css`,
	},
	js: {
		src: [`${srcPath}/js/third-party.js`],
		dest: `${publicPath}/js`,
	},
	icons: {
		src: `${srcPath}/icons/flaticon.svg`,
		dest: `${publicPath}/icons`,
	},
};
function buildIcons(params) {
	return gulp
		.src(["./node_modules/bootstrap-icons/bootstrap-icons.svg"])
		.pipe(gulp.dest(paths.icons.dest))
		.pipe(rename("icons.svg"))
		.pipe(gulp.dest(paths.icons.dest));
}
function buildStyles() {
	return (
		gulp
			.src(paths.css.src)
			.pipe(sassGlob())
			.pipe(
				sass({
					outputStyle: isProduction ? "compressed" : "expanded",
					includePaths: ["node_modules"],
				}).on("error", sass.logError)
			)
			// .pipe(cleanCSS())
			.pipe(gulp.dest(paths.css.dest))
	);
}

function buildComponentStyles() {
	return (
		gulp
			.src(paths.css.src)
			.pipe(sassGlob())
			.pipe(
				sass({
					outputStyle: isProduction ? "compressed" : "expanded",
					includePaths: ["node_modules"],
				}).on("error", sass.logError)
			)
			// .pipe(cleanCSS())
			.pipe(gulp.dest(paths.css.dest))
	);
}

function buildScripts() {
	return (
		gulp
			.src([`${srcPath}/js/*.js`])
			.pipe(named())
			//.pipe(webpack(webpackConfig, webpackCompiler))
			.pipe(gulp.dest(`${publicPath}/js`))
	);
}

function buildVendorScripts() {
	return gulp
		.src([`./node_modules/bootstrap/dist/js/bootstrap.bundle.js`], {
			sourcemaps: true,
		})
		.pipe(concat("vendor.js"))
		.pipe(gulp.dest(`${publicPath}/js`));
}

function cleanFiles() {
	return gulp
		.src([`${publicPath}/css/**/*`, `${publicPath}/js/**/*`], {
			read: false,
		})
		.pipe(clean());
}
function purgeCSS() {
	return gulp
		.src("src/public/**/*.css")
		.pipe(
			purgecss({
				content: ["src/purge/**/*.html"],
				safelist: ["show"],
				variables: true,
			})
		)
		.pipe(gulp.dest("src/build"));
}
function watchFiles() {
	gulp.watch(
		[`${srcPath}/site/**/*.scss`, `${srcPath}/scss/**/*.scss`],
		gulp.parallel(buildIcons, buildStyles)
	);
	gulp.watch(
		[`${srcPath}/js/**/*.js`],
		gulp.parallel(buildVendorScripts, buildScripts)
	);
}

const buildFiles = gulp.series(
	cleanFiles,
	gulp.parallel(buildIcons, buildStyles, buildScripts, buildVendorScripts)
);

const build = gulp.series(buildFiles);
const development = gulp.series(buildFiles, watchFiles);

exports.build = build;
exports.default = development;
exports.components = gulp.series(buildComponentStyles);
exports.purge = gulp.series(build, purgeCSS);

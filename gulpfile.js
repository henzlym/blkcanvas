"use strict";

require("module-alias/register");
/**
 * Gulp Dependecies
 */
const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const clean = require("gulp-clean");
const concat = require("gulp-concat");
const purgecss = require("gulp-purgecss");
const rename = require("gulp-rename");
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
		src: `${srcPath}/scss/site.scss`,
		public: `${srcPath}/public/css/site.css`,
		dest: `${publicPath}/css`,
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
	return gulp
		.src(paths.css.src)
		.pipe(sassGlob())
		.pipe(
			sass({
				outputStyle: isProduction ? "compressed" : "expanded",
				includePaths: ["node_modules"],
			}).on("error", sass.logError)
		)
		.pipe(gulp.dest(paths.css.dest));
}

function buildScripts() {
	return gulp
		.src([`${srcPath}/js/*.js`])
		.pipe(named())
		.pipe(webpack(webpackConfig, webpackCompiler))
		.pipe(gulp.dest(`${publicPath}/js`));
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

function buildComponentStyles() {
	var files = [
		"/Users/henzlymeghie/Development/website-framework/framework/src/build/components/preview/*.html",
	];

	// Go through each html build file
	// Create a new css file using the site.css contents and renaming it the same as the current html build file
	// Extract the unused css from that new css file
	// Export the purged css file into the build folder
	return gulp
		.src(files)
		.pipe(
			tap(async function (file) {
				const siteCss = fs.readFileSync(paths.css.public, "utf8");
				file.contents = Buffer.from(siteCss);
			})
		)
		.pipe(
			rename({
				extname: ".css",
			})
		)
		.pipe(gulp.dest(`${srcPath}/public/components`))
		.on("error", (err) =>
			console.error("Error during purgecss task:", err)
		);
}

function purgeComponentStyles() {
	var files = fs.readdirSync(`${srcPath}/public/components`);
	return Promise.all(
		files.map((task) => {
			return new Promise((resolve, reject) => {
				const filename = task.replace(".css", "");
				return gulp
					.src(`${srcPath}/public/components/${filename}.css`)
					.pipe(
						purgecss({
							content: [
								`/Users/henzlymeghie/Development/website-framework/framework/src/build/components/preview/${filename}.html`,
							],
							variables: true,
						})
					)
					.pipe(gulp.dest(`${srcPath}/dist/components`))
					.on("end", () => resolve());
			});
		})
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
exports.components = gulp.series(buildComponentStyles, purgeComponentStyles);

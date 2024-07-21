const gulp = require("gulp");
const named = require("vinyl-named");
const concat = require("gulp-concat");
const path = require("path");

const srcPath = path.resolve(__dirname, "../src");
const buildPath = path.resolve(srcPath, "build");

function buildScripts() {
	return (
		gulp
			.src([`${srcPath}/js/*.js`])
			.pipe(named())
			// .pipe(webpack(webpackConfig, webpackCompiler))
			.pipe(gulp.dest(`${buildPath}/js`))
	);
}

function buildVendorScripts() {
	return gulp
		.src(["./node_modules/bootstrap/dist/js/bootstrap.bundle.js"], {
			sourcemaps: true,
		})
		.pipe(concat("vendor.js"))
		.pipe(gulp.dest(`${buildPath}/js`));
}

gulp.task("scripts", buildScripts);
gulp.task("vendor-scripts", buildVendorScripts);

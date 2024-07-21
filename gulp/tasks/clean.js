const gulp = require("gulp");
const clean = require("gulp-clean");
const path = require("path");

const buildPath = path.resolve(__dirname, "../src/build");

function cleanFiles() {
	return gulp
		.src([buildPath], {
			read: false,
		})
		.pipe(clean());
}

gulp.task("clean", cleanFiles);

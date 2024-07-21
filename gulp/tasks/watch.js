const gulp = require("gulp");
const path = require("path");

const srcPath = path.resolve(__dirname, "../src");

function watchFiles() {
	gulp.watch(
		[`${srcPath}/site/**/*.scss`, `${srcPath}/scss/**/*.scss`],
		gulp.parallel("icons", "styles")
	);
	gulp.watch(
		[`${srcPath}/js/**/*.js`],
		gulp.parallel("vendor-scripts", "scripts")
	);
}

gulp.task("watch", watchFiles);

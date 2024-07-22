const requireDir = require("require-dir");
requireDir("./gulp", { recurse: true });

const gulp = require("gulp");

const buildFiles = gulp.series(
	"clean",
	gulp.parallel("icons", "styles", "scripts", "vendor-scripts")
);

const build = gulp.series(buildFiles);
const development = gulp.series(buildFiles, "watch");

gulp.task("build", build);
gulp.task("default", development);
gulp.task("components", gulp.series("component-styles"));
gulp.task("criticalcss", gulp.series("criticalcss"));
gulp.task("combine-css", gulp.series("combine-css"));

const gulp = require("gulp");
const rename = require("gulp-rename");
const path = require("path");

const paths = {
	icons: {
		src: "./node_modules/bootstrap-icons/bootstrap-icons.svg",
		dest: path.resolve(__dirname, "../src/build/icons"),
	},
};

function buildIcons() {
	return gulp
		.src([paths.icons.src])
		.pipe(gulp.dest(paths.icons.dest))
		.pipe(rename("icons.svg"))
		.pipe(gulp.dest(paths.icons.dest));
}

gulp.task("icons", buildIcons);

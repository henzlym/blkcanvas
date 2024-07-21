const gulp = require("gulp");
const postcss = require("gulp-postcss");
const purgecss = require("@fullhuman/postcss-purgecss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const rename = require("gulp-rename");
const fs = require("fs");
const path = require("path");
const captureAboveTheFoldHTML = require("../utils/html-above-the-fold");
const ensureTempDirectory = require("../utils/temp-directory");
const paths = require("../utils/paths");

const templates = [
	{
		htmlFile: paths.critical.single.html,
		cssFile: paths.critical.single.css,
		outputName: "single",
	},
	{
		htmlFile: paths.critical.archive.html,
		cssFile: paths.critical.archive.css,
		outputName: "archive",
	},
];

async function generateCriticalCSS() {
	ensureTempDirectory();

	for (const template of templates) {
		const { htmlFile, cssFile, outputName } = template;
		const aboveTheFoldHTML = await captureAboveTheFoldHTML(htmlFile);

		// Write the above-the-fold HTML to a temporary file
		const tempHtmlFile = path.resolve(
			"dist/critical",
			`${outputName}.html`
		);
		fs.writeFileSync(tempHtmlFile, aboveTheFoldHTML);

		await new Promise((resolve, reject) => {
			gulp.src(cssFile)
				.pipe(
					postcss([
						purgecss({
							content: [tempHtmlFile],
							defaultExtractor: (content) =>
								content.match(/[\w-/:]+(?<!:)/g) || [],
						}),
						autoprefixer(),
						cssnano(),
					])
				)
				.on("error", (err) => {
					console.error("PostCSS error:", err);
					reject(err);
				})
				.pipe(
					rename({
						dirname: "critical",
						basename: outputName,
						extname: ".css",
					})
				) // Rename the output file
				.pipe(gulp.dest("dist"))
				.on("end", resolve);
		});

		// Clean up the temporary file
		fs.unlinkSync(tempHtmlFile);
	}
}

gulp.task("criticalcss", generateCriticalCSS);

module.exports = generateCriticalCSS;

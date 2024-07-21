const path = require("path");

const srcPath = `${__dirname}/../../src`;
const buildPath = `${srcPath}/build`;

const paths = {
	srcPath,
	buildPath,
	css: {
		src: [`${srcPath}/scss/site.scss`],
		dest: `${buildPath}/`,
	},
	js: {
		src: [`${srcPath}/js/third-party.js`],
		dest: `${buildPath}/js`,
	},
	icons: {
		src: `${srcPath}/icons/flaticon.svg`,
		dest: `${buildPath}/icons`,
	},
	html: {
		single: "dist/html/single.html",
		archive: "dist/html/archive.html",
	},
	critical: {
		single: {
			css: "dist/styles/site.css",
			html: "dist/html/single.html",
			dest: "dist/critical",
		},
		archive: {
			css: "dist/styles/site.css",
			html: "dist/html/archive.html",
			dest: "dist/critical",
		},
	},
};

module.exports = paths;

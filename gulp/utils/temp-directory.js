const fs = require("fs");
const path = require("path");

function ensureTempDirectory() {
	const tempDir = path.resolve("dist/critical");
	if (!fs.existsSync(tempDir)) {
		fs.mkdirSync(tempDir, { recursive: true });
	}
}

module.exports = ensureTempDirectory;

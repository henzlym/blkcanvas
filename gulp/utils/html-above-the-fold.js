const puppeteer = require("puppeteer");
const path = require("path");

async function captureAboveTheFoldHTML(htmlFile) {
	const browser = await puppeteer.launch();
	const page = await browser.newPage();
	await page.goto(`file://${path.resolve(htmlFile)}`);

	// Set viewport to capture above-the-fold content
	await page.setViewport({ width: 1280, height: 900 });

	// Get the above-the-fold HTML content
	const aboveTheFoldHTML = await page.evaluate(() => {
		function cloneAboveTheFold(element, maxHeight) {
			if (element.nodeType !== Node.ELEMENT_NODE) {
				return element.cloneNode(true);
			}

			const rect = element.getBoundingClientRect();
			if (rect.top >= maxHeight) {
				return null;
			}

			const clone = element.cloneNode(false);
			for (const child of element.childNodes) {
				const clonedChild = cloneAboveTheFold(child, maxHeight);
				if (clonedChild) {
					clone.appendChild(clonedChild);
				}
			}
			return clone;
		}

		const maxHeight = 900;
		const bodyClone = document.createElement("body");

		for (const child of document.body.childNodes) {
			const clonedChild = cloneAboveTheFold(child, maxHeight);
			if (clonedChild) {
				bodyClone.appendChild(clonedChild);
			}
		}

		const doctype = new XMLSerializer().serializeToString(document.doctype);
		const htmlClone = document.documentElement.cloneNode(false);
		const headClone = document.head.cloneNode(true);
		htmlClone.appendChild(headClone);
		htmlClone.appendChild(bodyClone);

		return `${doctype}\n${htmlClone.outerHTML}`;
	});

	await browser.close();

	return aboveTheFoldHTML;
}

module.exports = captureAboveTheFoldHTML;

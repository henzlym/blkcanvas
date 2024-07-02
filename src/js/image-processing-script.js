function runImageProcessing() {
	const canvas = document.createElement("canvas");
	const ctx = canvas.getContext("2d");
	const img = new Image();
	img.src = "https://via.placeholder.com/500";

	img.onload = () => {
		canvas.width = img.width;
		canvas.height = img.height;
		ctx.drawImage(img, 0, 0);
		const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
		const data = imageData.data;

		const start = performance.now();
		for (let i = 0; i < data.length; i += 4) {
			// Invert colors
			data[i] = 255 - data[i]; // Red
			data[i + 1] = 255 - data[i + 1]; // Green
			data[i + 2] = 255 - data[i + 2]; // Blue
		}
		ctx.putImageData(imageData, 0, 0);
		const end = performance.now();
		console.log(`Image processing took ${end - start} ms`);
	};
}

function initTask(eventType, divId) {
	const div = document.getElementById(divId);
	if (div) {
		if (eventType === "load") {
			runImageProcessing();
		} else {
			window.addEventListener(eventType, runImageProcessing, {
				once: true,
			});
		}
	}
}

initTask("load", "image-processing-div"); // Change 'load' to 'scroll' or 'click'

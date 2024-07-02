function runLongLoop() {
	const start = performance.now();
	for (let i = 0; i < 1e8; i++) {
		// Busy wait
	}
	const end = performance.now();
	console.log(`Long loop took ${end - start} ms`);
}

function initTask(eventType, divId) {
	const div = document.getElementById(divId);
	if (div) {
		if (eventType === "load") {
			runLongLoop();
		} else {
			window.addEventListener(eventType, runLongLoop, { once: true });
		}
	}
}

initTask("load", "long-loop-div"); // Change 'load' to 'scroll' or 'click'

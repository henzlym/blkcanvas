const arrayLength = 1000000 * 12;

function runArraySort() {
	console.log(`Array sorting init`);
	const arr = Array.from({ length: arrayLength }, () =>
		Math.floor(Math.random() * 1000000)
	);
	const start = performance.now();
	arr.sort((a, b) => a - b);
	const end = performance.now();
	console.log(`Array sorting took ${end - start} ms`);
}

function initTask(eventType, divId) {
	console.log("array-sort-div:initTask");
	const div = document.getElementById(divId);
	if (div) {
		if (eventType === "load") {
			runArraySort();
		} else {
			window.addEventListener(eventType, runArraySort, { once: true });
		}
	}
}

initTask("load", "array-sort-div"); // Change 'load' to 'scroll' or 'click'

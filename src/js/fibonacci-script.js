function fibonacci(n) {
	if (n <= 1) return n;
	return fibonacci(n - 1) + fibonacci(n - 2);
}

function runFibonacci() {
	const start = performance.now();
	const result = fibonacci(40); // Change the number to increase the task length
	const end = performance.now();
	console.log(`Fibonacci result: ${result}`);
	console.log(`Fibonacci task took ${end - start} ms`);
}

function initTask(eventType, divId) {
	const div = document.getElementById(divId);
	if (div) {
		if (eventType === "load") {
			runFibonacci();
		} else {
			window.addEventListener(eventType, runFibonacci, { once: true });
		}
	}
}

initTask("load", "fibonacci-div"); // Change 'load' to 'scroll' or 'click'

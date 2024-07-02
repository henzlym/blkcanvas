function isPrime(num) {
	for (let i = 2, sqrt = Math.sqrt(num); i <= sqrt; i++) {
		if (num % i === 0) return false;
	}
	return num > 1;
}

function runPrimeCalculation() {
	const start = performance.now();
	const primes = [];
	for (let i = 2; i < 100000; i++) {
		if (isPrime(i)) primes.push(i);
	}
	const end = performance.now();
	console.log(`Prime calculation took ${end - start} ms`);
	console.log(`Number of primes found: ${primes.length}`);
}

function initTask(eventType, divId) {
	const div = document.getElementById(divId);
	if (div) {
		if (eventType === "load") {
			runPrimeCalculation();
		} else {
			window.addEventListener(eventType, runPrimeCalculation, {
				once: true,
			});
		}
	}
}

initTask("load", "prime-calc-div"); // Change 'load' to 'scroll' or 'click'

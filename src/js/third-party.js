document.addEventListener("DOMContentLoaded", function () {
	console.log("LOAD THIRD PARTY SCRIPTS");
	// Function to load a script asynchronously
	function loadScript(
		src,
		callback = null,
		async = true,
		defer = false,
		footer = false
	) {
		var script = document.createElement("script");
		script.src = src;
		if (defer && !async) {
			script.defer = defer;
		} else if (async) {
			script.async = async;
		}
		script.onload = callback || function () {};

		if (footer) {
			document.body.appendChild(script);
		} else {
			document.head.appendChild(script);
		}
	}

	// Google Analytics
	// loadScript(
	// 	"https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X",
	// 	function () {
	// 		window.dataLayer = window.dataLayer || [];
	// 		function gtag() {
	// 			dataLayer.push(arguments);
	// 		}
	// 		gtag("js", new Date());
	// 		gtag("config", "UA-XXXXXXXXX-X");
	// 	}
	// );

	// Facebook Pixel
	// loadScript("https://connect.facebook.net/en_US/fbevents.js", function () {
	// 	!(function (f, b, e, v, n, t, s) {
	// 		if (f.fbq) return;
	// 		n = f.fbq = function () {
	// 			n.callMethod
	// 				? n.callMethod.apply(n, arguments)
	// 				: n.queue.push(arguments);
	// 		};
	// 		if (!f._fbq) f._fbq = n;
	// 		n.push = n;
	// 		n.loaded = !0;
	// 		n.version = "2.0";
	// 		n.queue = [];
	// 		t = b.createElement(e);
	// 		t.async = !0;
	// 		t.src = v;
	// 		s = b.getElementsByTagName(e)[0];
	// 		s.parentNode.insertBefore(t, s);
	// 	})(
	// 		window,
	// 		document,
	// 		"script",
	// 		"https://connect.facebook.net/en_US/fbevents.js"
	// 	);
	// 	fbq("init", "XXXXXXXXXXXXXXX");
	// 	fbq("track", "PageView");

	// 	var noscript = document.createElement("noscript");
	// 	var img = document.createElement("img");
	// 	img.height = 1;
	// 	img.width = 1;
	// 	img.style.display = "none";
	// 	img.src =
	// 		"https://www.facebook.com/tr?id=XXXXXXXXXXXXXXX&ev=PageView&noscript=1";
	// 	noscript.appendChild(img);
	// 	document.body.appendChild(noscript);
	// });

	// Twitter Widget
	// loadScript("https://platform.twitter.com/widgets.js");

	// Google Ads
	// loadScript(
	// 	"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js",
	// 	function () {
	// 		(adsbygoogle = window.adsbygoogle || []).push({
	// 			google_ad_client: "ca-pub-XXXXXXXXXXXXXXXX",
	// 			enable_page_level_ads: true,
	// 		});
	// 	}
	// );

	// Disqus Comments
	// loadScript("https://example.disqus.com/embed.js", function () {
	// 	window.disqus_config = function () {
	// 		this.page.url = "http://example.com";
	// 		this.page.identifier = "example-page";
	// 	};

	// 	var noscript = document.createElement("noscript");
	// 	noscript.innerHTML =
	// 		'Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>';
	// 	document.body.appendChild(noscript);
	// });

	// YouTube Embed
	// var iframe = document.createElement("iframe");
	// iframe.width = "560";
	// iframe.height = "315";
	// iframe.src = "https://www.youtube.com/embed/VIDEO_ID";
	// iframe.frameborder = "0";
	// iframe.allow =
	// 	"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture";
	// iframe.allowFullscreen = true;
	// document.body.appendChild(iframe);

	// Google Maps
	// loadScript(
	// 	"https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap",
	// 	function () {
	// 		window.initMap = function () {
	// 			var map = new google.maps.Map(document.getElementById("map"), {
	// 				center: { lat: -34.397, lng: 150.644 },
	// 				zoom: 8,
	// 			});
	// 		};

	// 		var mapDiv = document.createElement("div");
	// 		mapDiv.id = "map";
	// 		mapDiv.style.height = "400px";
	// 		mapDiv.style.width = "100%";
	// 		document.body.appendChild(mapDiv);
	// 	}
	// );
	// loadScript(
	// 	"http://wordpress.portfolio.local/wp-content/themes/blkcanvas/src/js/array-sort-script.js?ver=1.0.0",
	// 	null,
	// 	false,
	// 	true,
	// 	true
	// );
});

function observeImagesAndOtherElements() {
	console.log("observeImagesAndOtherElements");
	const images = document.querySelectorAll("img");
	const otherElements = document.querySelectorAll(
		'link[rel="stylesheet"], script'
	);

	let loadedCount = 0;
	const totalElements = images.length + otherElements.length;

	function checkAllLoaded() {
		console.log("checkAllLoaded", totalElements);
		console.log("loadedCount", loadedCount);
		loadedCount++;
		if (loadedCount === totalElements) {
			console.log("All images and other elements have finished loading!");
			// Initialize your script here
		}
	}

	images.forEach((img) => {
		if (img.complete) {
			checkAllLoaded();
		} else {
			img.addEventListener("load", checkAllLoaded);
			img.addEventListener("error", checkAllLoaded);
		}
	});

	otherElements.forEach((el) => {
		el.addEventListener("load", checkAllLoaded);
		el.addEventListener("error", checkAllLoaded);
	});
}

window.addEventListener("load", function () {
	observeImagesAndOtherElements();
});

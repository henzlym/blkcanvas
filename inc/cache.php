<?php
function my_custom_page_cache()
{
	// Cache settings
	$cacheDuration = 3600; // Cache duration in seconds (1 hour)
	$cacheDir = WP_CONTENT_DIR . '/cache/pages/'; // Cache directory

	// Create the cache directory if it doesn't exist
	if (!is_dir($cacheDir)) {
		mkdir($cacheDir, 0755, true);
	}

	// Generate a unique cache key based on the request URI
	$cacheKey = md5($_SERVER['REQUEST_URI']);
	$cacheFile = $cacheDir . $cacheKey . '.html';

	// Check if a valid cache file exists
	if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheDuration) {
		// Serve the cached file
		readfile($cacheFile);
		exit;
	}

	// Start output buffering
	ob_start();

	// Hook into 'shutdown' to save the buffer content into the cache
	add_action('wp_footer', function () use ($cacheFile) {
		// Get the generated content
		$pageContent = ob_get_contents();
		ob_end_flush(); // End and flush the buffer

		// Save the generated content to the cache file
		file_put_contents($cacheFile, $pageContent);
	});
}

// Hook the function to run before template loading
add_action('template_redirect', 'my_custom_page_cache');

<?php
function fw_get_site_config() : array {
	$site_config = array(
		"menus" => array(
			'primary' => 'Primary Menu',
			'secondary' => 'Secondary Menu',
			'utility' => 'Utility Menu',
			'sidebar' => 'Sidebar Menu',
			'socials' => 'Socials Menu',
			'testing' => 'Testing Menu',
		)
	);
	
	return $site_config;
}
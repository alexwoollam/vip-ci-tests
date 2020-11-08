<?php // phpcs:disable
if (defined('ABSPATH')) {
    return;
}

//require_once realpath('./functions.php');
define('ABSPATH', realpath('./vendor/wordpress/wordpress') . DIRECTORY_SEPARATOR);
defined('WPINC') or define('WPINC', 'wp-includes');
defined('OBJECT') or define('OBJECT', 'OBJECT');

require_once(ABSPATH . WPINC . '/sodium_compat/autoload.php');

/**
 * Requests autoloader
 */
spl_autoload_register(function ($class) {
	// Check that the class starts with "Requests"
	if (strpos($class, 'Requests_') !== 0) {
		return;
	}

	$file = str_replace('_', '/', $class);
	if (file_exists(ABSPATH . WPINC . '/' . $file . '.php')) {
		require_once(ABSPATH . WPINC . '/' . $file . '.php');
	}
});

/**
 * SimplePie autoloader
 */
spl_autoload_register(function ($class) {
	if (strpos( $class, 'SimplePie_') !== 0) {
		return;
	}

	$file = str_replace('_', '/', $class);
	if (file_exists(ABSPATH . WPINC . '/' . $file . '.php')) {
		require_once(ABSPATH . WPINC . '/' . $file . '.php');
	}
});
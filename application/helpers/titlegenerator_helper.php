<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function convertTitleToURL($title) {
	// $title = strtolower($title);
	// $title = trim($title);
    // $title = str_replace(' ', '-', $title);
    // $title = preg_replace('/[^a-z0-9-]/i', '', $title);
    // $title = str_replace('--', '-', $title);
    // $title = substr($title, 0, 199);

	$title = strtolower($title);
	$title = trim($title);
    $title = preg_replace('/[^\w\s-]/i', '', $title);
	$title = preg_replace('/[\s_-]+/i', '-', $title);
	$title = preg_replace('/^-+|-+$/i', '', $title);

    return $title;
}

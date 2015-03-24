<?php

/*
	Plugin Name: ACF Supports Location
	Plugin URI: https://github.com/theideabureau/acf-supports-location
	Version: 0.1
	Author: The Idea Bureau
	Description: Adds a new location for Advanced Custom Fields for post type support.
	Text Domain: acf-supports-location
	License: GPLv3
*/


add_filter('acf/location/rule_types', function($choices) {

	$choices['Supports']['supports'] = 'Post Type Support';

	return $choices;

});

add_filter('acf/location/rule_values/supports', function($choices) {

	$choices = array_merge($choices, array(
		'title' => 'Title',
		'editor' => 'Editor',
		'author' => 'Author',
		'thumbnail' => 'Thumbnail',
		'excerpt' => 'Excerpt',
		'trackbacks' => 'Trackbacks',
		'custom-fields' => 'Custom Fields',
		'comments' => 'Comments',
		'revisions' => 'Revisions',
		'page-attributes' => 'Page Attributes',
		'post-formats' => 'Post Formats'
	));

	return $choices;

});

add_filter('acf/location/rule_match/supports', function($match, $rule, $options) {

	$supported = post_type_supports(get_post_type(), $rule['value']);
	$required = $rule['operator'] === '==';

	return $supported === $required;

}, 10, 3);

<?php
/**
 * Template Name: Homepage Template
 * Description: A Page Template only for homepage
 *
 *
 *
 * @package WordPress
 * @subpackage Magazine
 * @since Magazine 1.0
 */

$latteParams['post'] = WpLatte::createPostEntity(
	$GLOBALS['wp_query']->post,
	array(
		'meta' => $GLOBALS['pageOptions'],
	)
);
$latteParams['queried'] = $GLOBALS['wp_query']->get_queried_object();


if ( ! isset( $content_width ) )
$content_width = 1024;

/**
 * Fire!
 */
WPLatte::createTemplate(basename(__FILE__, '.php'), $latteParams)->render();
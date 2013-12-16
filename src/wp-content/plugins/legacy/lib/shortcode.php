<?php

add_shortcode("raw", "legacy_raw");

function legacy_raw($atts, $content, $tag) {
	return $content;
}

add_shortcode("frame", "legacy_frame");

function legacy_frame($atts, $content, $tag) {

	extract( shortcode_atts( array (
		'title' => '---',
	), $atts ) );

	$title = $title == '---' ? '' : "<h3>$title</h3>";

	return '<div class="six columns  b10">' . $title . $content . '</div>';
}
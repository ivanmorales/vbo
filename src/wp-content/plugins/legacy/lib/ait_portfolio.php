<?php
function ait_portfolio( $params ) {
	extract( shortcode_atts( array (
		'slug' => 'all',
		'cat_id' => '',
		'width' => '',
		'height' => '',
		'showdescription' => '',
		'cols' => '1',
	), $params ) );

	wp_enqueue_style("fancybox.css", "//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css");
	wp_enqueue_script("fancybox.js", "//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js");

	if($slug == 'all'){
		$args = array( 'numberposts' => 500 , 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC' );
	} elseif($cat_id != '') {
		$args = array( 'numberposts' => 500, 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'taxonomy' => 'portfolio_tag', 'term' => $cat_id );
	} else {
		$args = array( 'numberposts' => 500, 'post_type' => 'portfolio', 'orderby' => 'menu_order', 'order' => 'ASC', 'taxonomy' => 'portfolio_tag', 'term' => $slug );
	}

	if ($cols > 5) $cols = 1;

	$portfolio_images = get_posts($args);
	$class = "ait-portfolio";
	$descrAdd = "";

	if (!empty($showdescription)) {
		if ($showdescription == "down") {
			$class .= " desc-down";
		}
		if ($showdescription == "right") {
			$class .= " desc-right";
			$descrAdd = 'style="margin-left: '.($width+5).'px;"';
		}
	}
	$class .= " pf-col".$cols;

	$result = '<div class="fancy-gallery">';
	$count = count($portfolio_images);
	$i=0;

	foreach ($portfolio_images as $key => $post_image) {

		// ITEM LINK
		$meta = get_post_meta($post_image->ID, '_ait-portfolio', TRUE);
		if($meta['itemType'] == "image"){
			$item_link = $meta['imageLink'];
			$item_type = 'image-type';
		} elseif($meta['itemType'] == "website"){
			$item_link = $meta['websiteLink'];
			$item_type = 'website-type';
		} elseif($meta['itemType'] == "video"){
			$item_link = $meta['videoLink'];
			$item_type = 'video-type';
		}

		// ITEM THUMBNAIL
		if (get_the_post_thumbnail( $post_image->ID )) {
		  	$result .= '<a rel="gallery1" class="zoom '.$item_type.' '.$slug.'" href="'.$item_link.'" title="'.$meta['itemTitle'].'">';

		  	$thumbnail_id = get_post_thumbnail_id( $post_image->ID );
			$thumbnail_args = wp_get_attachment_image_src( $thumbnail_id, 'large' );
			$result .= '<img width="213" height="106" src="'.TIMTHUMB_URL.'?src='.$thumbnail_args['0'].'&amp;w=180&amp;h=106" alt="" />';

			$result .= '</a>';
		}
    	}

    	$result .= '</div><!-- end of .ait-portfolio -->';
	$result .= '
		<script>
		(function($, window) {
			$(document).ready(function() {
				$(".fancy-gallery a").fancybox({
					prevEffect: "none",
					nextEffect: "none",
					helpers: {
						title: {
							type: "inside"
						},
						thumbs	: {
							width	: 50,
							height	: 50
						}
					}
				});
			});
		})(jQuery, window);
		</script>';
	return $result;
}
add_shortcode( "ait-portfolio", "ait_portfolio" );
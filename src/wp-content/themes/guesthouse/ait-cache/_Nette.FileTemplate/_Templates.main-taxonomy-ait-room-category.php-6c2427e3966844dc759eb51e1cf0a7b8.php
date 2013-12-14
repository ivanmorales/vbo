<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.24597600 1367012135";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:91:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-taxonomy-ait-room-category.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-taxonomy-ait-room-category.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '9pj8h48dgg')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb48c52cc1e5_content')) { function _lb48c52cc1e5_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div id="container" class="clear onecolumn">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content defaultContentWidth">
		<div id="content-wrapper">
			<h1>Our Rooms</h1>
            <div class="mainbar">
            <p style="width:700px;">
            <img src="http://www.villabuenaonda.com/wp-content/uploads/Nispero-Ocean-View-Suite-interior.jpg" alt="Ocean View Suite Interior" /><br /><br />
            We have seven spacious suites at our hotel, each one named after a tree species native to the region. There are three on the 1st floor and four on the 2nd floor, each with an en suite bathroom, fine linens, full closets, surround sound, original paintings and 10 ft. ceilings.</p>
<p style="width:700px;">Our rooms enjoy ocean views from a private patio or balcony, and our 2 Bedroom Suite has partial ocean view from the front room. The two corner suites on the 2nd floor have over-sized bathrooms with semi-open-air showers, while the downstairs Poro Poro Suite is handicap accessible.</p>
		</div>
<?php if ($posts): ?>
		<div class="sidebar">
<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['9pj8h48dgg'])->render() ?>

<?php NCoreMacros::includeTemplate("snippet-rooms-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['9pj8h48dgg'])->render() ?>

<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['9pj8h48dgg'])->render() ?>
		</div>
<?php else: ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2 class="entry-title">Nothing Found</h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
<?php NCoreMacros::includeTemplate('general-search-form.php', $template->getParams(), $_l->templates['9pj8h48dgg'])->render() ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

<?php endif ?>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->
</div><!-- end of container -->
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = true; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
$_l->extends = 'main-layout.php' ;  
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

<?php //netteCache[01]000369a:2:{s:4:"time";s:21:"0.64974800 1367012048";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:80:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-single-ait-room.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-single-ait-room.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'sgzcfh1ly7')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbe420528cce_content')) { function _lbe420528cce_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>

      <div class="postitem clear">
<?php if (!isset($post->options('post_featured_images')->hideFeatured)): if ($post->thumbnailSrc != false): ?>
			<a href="<?php echo htmlSpecialChars($post->thumbnailSrc) ?>">
			<div class="entry-thumbnail">
				<img src="<?php echo htmlSpecialChars($timthumbUrl) ?>?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=650&h=390" alt="" />
			</div>
			</a>
<?php endif ;endif ?>
      </div>
			<div class="entry-content">
				<?php echo $post->content ?>

			</div>





<?php NCoreMacros::includeTemplate('snippet-post-nav.php', array('location'=> 'nav-above') + $template->getParams(), $_l->templates['sgzcfh1ly7'])->render() ?>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">
<?php dynamic_sidebar("post-widgets-area") ?>
	</div><!-- end of sidebar -->

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
$_l->extends = 'main-layout.php' ?>


<?php isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'lv' ;//
// block $localViewer
//
if (!function_exists($_l->blocks[$localViewer][] = '_lba24ce0a781__localViewer')) { function _lba24ce0a781__localViewer($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-room-viewer.php", array('options' => $post->options('page_room'), 'rooms' => $site->create('room', $post->options('page_room')->roomViewerCat)) + $template->getParams(), $_l->templates['sgzcfh1ly7'])->render() ;}} call_user_func(reset($_l->blocks[$localViewer]), $_l, get_defined_vars()) ?>

<?php isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'someRandomNotImportantStringHome2' ;//
// block $localService
//
if (!function_exists($_l->blocks[$localService][] = '_lbc52e6071a5__localService')) { function _lbc52e6071a5__localService($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('boxes' => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)) + $template->getParams(), $_l->templates['sgzcfh1ly7'])->render() ;}} call_user_func(reset($_l->blocks[$localService]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

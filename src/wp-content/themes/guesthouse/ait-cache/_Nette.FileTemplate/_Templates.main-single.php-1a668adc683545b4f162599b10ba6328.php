<?php //netteCache[01]000360a:2:{s:4:"time";s:21:"0.07538400 1367465752";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:71:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-single.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-single.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'r7pxkphjsb')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbb940b4daa7_content')) { function _lbb940b4daa7_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
<?php if ($post->thumbnailSrc != false): ?>
    <div id="content-wrapper">
<?php else: ?>
    <div id="content-wrapper" class="no-thumbnail">
<?php endif ?>
			<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>

<?php if ($post->thumbnailSrc != false): ?>
      <div class="postitem clear">
<?php else: ?>
      <div class="postitem">
<?php endif ?>

<?php if (!$post->options('post_featured_images')->hideFeatured): if ($post->thumbnailSrc != false): ?>
			<a href="<?php echo htmlSpecialChars($post->thumbnailSrc) ?>">
			<div class="entry-thumbnail">
				<img src="<?php echo htmlSpecialChars($timthumbUrl) ?>?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=433&h=198" alt="" />
			</div>
			</a>
<?php endif ;endif ?>

      <div class="info-box">
<?php edit_post_link(__("Edit", THEME_CODE_NAME), "<span class=\"edit-link\">", "</span>", $post->id) ?>
          <a href="#" rel="prettySociable"><img class="share" src="<?php echo htmlSpecialChars($themeUrl) ?>/design/img/share.png" /></a>
          <div class="info-box-inside">
            <h3><?php echo NTemplateHelpers::escapeHtml($template->date($post->date, "j M"), ENT_NOQUOTES) ?></h3>
            <small>posted by <a class="url fn n" href="<?php echo htmlSpecialChars($post->author->postsUrl) ?>
" title="View all posts by <?php echo htmlSpecialChars($post->author->name) ?>" rel="author"><?php echo NTemplateHelpers::escapeHtml($post->author->name, ENT_NOQUOTES) ?></a></small>
            <br /><br />
<?php if ($post->type == 'post'): if ($post->categories): ?>
            <span><b>Categories: </b><?php echo $post->categories ?></span>
            <br /><br />
<?php endif ;if ($post->tags): ?>
            <span><b>Tags: </b><?php echo $post->tags ?></span>
            <br /><br />
<?php endif ;endif ?>
          </div>
        </div>
      </div>
			<div class="entry-content">
				<?php echo $post->content ?>

			</div>





<?php NCoreMacros::includeTemplate('snippet-post-nav.php', array('location'=> 'nav-above') + $template->getParams(), $_l->templates['r7pxkphjsb'])->render() ?>
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
if (!function_exists($_l->blocks[$localViewer][] = '_lb6c7b289a9a__localViewer')) { function _lb6c7b289a9a__localViewer($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-room-viewer.php", array('options' => $post->options('page_room'), 'rooms' => $site->create('room', $post->options('page_room')->roomViewerCat)) + $template->getParams(), $_l->templates['r7pxkphjsb'])->render() ;}} call_user_func(reset($_l->blocks[$localViewer]), $_l, get_defined_vars()) ?>

<?php isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'someRandomNotImportantStringHome2' ;//
// block $localService
//
if (!function_exists($_l->blocks[$localService][] = '_lb98910428a8__localService')) { function _lb98910428a8__localService($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('boxes' => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)) + $template->getParams(), $_l->templates['r7pxkphjsb'])->render() ;}} call_user_func(reset($_l->blocks[$localService]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.93907500 1367011987";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:79:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-page-fullwidth.php";i:2;i:1367010651;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-page-fullwidth.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'kfrsjw8jye')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0b8f6d3c68_content')) { function _lb0b8f6d3c68_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div id="container" class="clear onecolumn">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content defaultContentWidth">
		<div id="content-wrapper">
			<h1><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>

<?php if ($post->thumbnailSrc != false): ?>
			<div class="entry-thumbnail">
				<img src="<?php echo htmlSpecialChars($timthumbUrl) ?>?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=640&h=200" alt="" />
			</div>
<?php endif ?>

			<?php echo $post->content ?>


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
$_l->extends = 'main-layout.php' ?>

<?php $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null ?>


<?php isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xr' ;//
// block $localViewer
//
if (!function_exists($_l->blocks[$localViewer][] = '_lb7f7485c746__localViewer')) { function _lb7f7485c746__localViewer($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-room-viewer.php", array('options' => $post->options('page_room'), 'rooms' => $site->create('room', $post->options('page_room')->roomViewerCat)) + $template->getParams(), $_l->templates['kfrsjw8jye'])->render() ;}} call_user_func(reset($_l->blocks[$localViewer]), $_l, get_defined_vars()) ?>

<?php isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xs' ;//
// block $localService
//
if (!function_exists($_l->blocks[$localService][] = '_lb9f04d72bb5__localService')) { function _lb9f04d72bb5__localService($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('boxes' => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)) + $template->getParams(), $_l->templates['kfrsjw8jye'])->render() ;}} call_user_func(reset($_l->blocks[$localService]), $_l, get_defined_vars()) ?>

<?php !empty($post->options('page_static_text')->staticText) ? $localStaticText = 'staticText' : $localStaticText = 'xt' ?>

<?php //
// block $localStaticText
//
if (!function_exists($_l->blocks[$localStaticText][] = '_lbc49db26f6b__localStaticText')) { function _lbc49db26f6b__localStaticText($_l, $_args) { extract($_args) ?>
      <div class="text defaultContentWidth clear">
        <?php echo do_shortcode($post->options('page_static_text')->staticText) ?>

      </div>
<?php }} call_user_func(reset($_l->blocks[$localStaticText]), $_l, get_defined_vars()) ;
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

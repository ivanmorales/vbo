<?php //netteCache[01]000379a:2:{s:4:"time";s:21:"0.25260900 1387056308";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:90:"/Users/ivan/Documents/git/vbo/src/wp-content/themes/guesthouse/Templates/main-homepage.php";i:2;i:1386698790;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /Users/ivan/Documents/git/vbo/src/wp-content/themes/guesthouse/Templates/main-homepage.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'dd58ipakb0')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb476347d7bf_content')) { function _lb476347d7bf_content($_l, $_args) { extract($_args)
?>

<div class="page-content">
<div id="container" class="home defaultContentWidth clear onecolumn">

<?php if (trim($post->content) != ""): ?>

  	<div id="content" class="mainbar entry-content" style="text-align: center; margin: 0 auto; padding-bottom: 10px;">
  		<?php echo $post->content ?>

  	</div>
<?php endif ?>

</div>
</div>

<div class="separator-line-new"></div>
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


<?php isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xv' ;//
// block $localViewer
//
if (!function_exists($_l->blocks[$localViewer][] = '_lb76b9273b42__localViewer')) { function _lb76b9273b42__localViewer($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-room-viewer-homepage.php", array('options' => $post->options('page_room'), 'rooms' => $site->create('room', $post->options('page_room')->roomViewerCat)) + $template->getParams(), $_l->templates['dd58ipakb0'])->render() ;}} call_user_func(reset($_l->blocks[$localViewer]), $_l, get_defined_vars()) ?>

<?php isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xsb' ;//
// block $localService
//
if (!function_exists($_l->blocks[$localService][] = '_lbcfaa324b5a__localService')) { function _lbcfaa324b5a__localService($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('options' => $post->options('page_service_boxes'), 'boxes' => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)) + $template->getParams(), $_l->templates['dd58ipakb0'])->render() ;}} call_user_func(reset($_l->blocks[$localService]), $_l, get_defined_vars()) ?>

<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

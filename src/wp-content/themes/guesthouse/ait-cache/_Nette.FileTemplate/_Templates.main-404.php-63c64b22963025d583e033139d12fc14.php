<?php //netteCache[01]000357a:2:{s:4:"time";s:21:"0.48702200 1367011215";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:68:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-404.php";i:2;i:1367010651;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-404.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'e5liqdrzzu')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb4bd44f3f6a_content')) { function _lb4bd44f3f6a_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div class="subpage-title-container defaultContentWidth">
  <h1><?php ob_start() ?>This is somewhat embarrassing, isn't it?<?php echo NTemplateHelpers::escapeHtml($template->translate(ob_get_clean()), ENT_NOQUOTES) ?></h1>
</div>

<div class="separator-line-new"></div>
<div id="container" class="subpage defaultContentWidth subpage-line clear">  
  <!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			
			<p><?php ob_start() ?>Apologies, but the page you requested could not be found. Perhaps searching will help.<?php echo NTemplateHelpers::escapeHtml($template->translate(ob_get_clean()), ENT_NOQUOTES) ?></p>

<?php NCoreMacros::includeTemplate("general-search-form.php", $template->getParams(), $_l->templates['e5liqdrzzu'])->render() ?>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">

<?php dynamic_sidebar("subpages-sidebar") ?>

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
$_l->extends = 'main-layout.php' ;  
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

<?php //netteCache[01]000362a:2:{s:4:"time";s:21:"0.88249000 1367331835";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:73:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-category.php";i:2;i:1367010651;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-category.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '8nnqayee9l')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb55d1cd9bd6_content')) { function _lb55d1cd9bd6_content($_l, $_args) { extract($_args)
?>

<!-- SUBPAGE -->
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">

<?php if ($posts): ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php ob_start() ?>Category Archives: <?php echo NTemplateHelpers::escapeHtml($template->translate(ob_get_clean()), ENT_NOQUOTES) ?>
<span><?php echo NTemplateHelpers::escapeHtml($category->title, ENT_NOQUOTES) ?></span>
					</h1>

<?php if (!empty($category->description)): ?>
						<div class="category-archive-meta"><?php echo $category->description ?></div>
<?php endif ?>
				</header>

<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-above') + $template->getParams(), $_l->templates['8nnqayee9l'])->render() ?>

<?php NCoreMacros::includeTemplate("snippet-content-loop.php", array('posts' => $posts) + $template->getParams(), $_l->templates['8nnqayee9l'])->render() ?>

<?php NCoreMacros::includeTemplate("general-content-nav.php", array('location' => 'nav-below') + $template->getParams(), $_l->templates['8nnqayee9l'])->render() ?>

<?php else: ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title">Nothing Found</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php ob_start() ?>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post<?php echo NTemplateHelpers::escapeHtml($template->translate(ob_get_clean()), ENT_NOQUOTES) ?></p>
<?php NCoreMacros::includeTemplate('general-search-form.php', $template->getParams(), $_l->templates['8nnqayee9l'])->render() ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

<?php endif ?>

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">

<?php dynamic_sidebar("blog-widgets-area") ?>

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

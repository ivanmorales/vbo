<?php //netteCache[01]000365a:2:{s:4:"time";s:21:"0.77769400 1367012048";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:76:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-post-nav.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-post-nav.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '03552wsf60')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//

/**
 * Template Name: Templates &raquo; Content navigation
 * Description: A Page Template only for homepage
 */
?>
<nav id="<?php echo htmlSpecialChars($location) ?>">
	<div class="nav-previous"><?php previous_post_link("%link", __('<span class="meta-nav">&larr;</span> Previous', THEME_CODE_NAME)) ?></div>
	<div class="nav-next"><?php next_post_link("%link", __('Next <span class="meta-nav">&rarr;</span>', THEME_CODE_NAME)) ?></div>
</nav>
<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.33187900 1367012135";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:79:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/general-content-nav.php";i:2;i:1367010651;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/general-content-nav.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'tb1rjsku65')
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
if($GLOBALS["wp_query"]->max_num_pages > 1): ?>
	<nav id="<?php echo htmlSpecialChars($location) ?>">
		<div class="nav-previous"><?php previous_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', THEME_CODE_NAME)) ?></div>
		<div class="nav-next"><?php next_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>', THEME_CODE_NAME)) ?></div>
	</nav>
<?php endif; 

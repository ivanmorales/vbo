<?php //netteCache[01]000368a:2:{s:4:"time";s:21:"0.56245700 1367011216";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:79:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/general-search-form.php";i:2;i:1367010651;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/general-search-form.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '2egzexsev7')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<form action="<?php echo htmlSpecialChars($homeUrl) ?>" id="search-form" method="get" class="searchform">
	<div>
	   	<label class="screen-reader-text" for="s"><?php ob_start() ?>Search for:<?php echo NTemplateHelpers::escapeHtml($template->translate(ob_get_clean()), ENT_NOQUOTES) ?></label>
		<input type="text" name="s" id="search-input" placeholder="search..." class="s" />
		<input type="submit" name="submit" id="search-submit" value="Search" class="searchsubmit" />
	</div>
</form>


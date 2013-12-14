<?php //netteCache[01]000367a:2:{s:4:"time";s:21:"0.36605700 1367012135";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:78:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-rooms-loop.php";i:2;i:1367010653;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-rooms-loop.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'lm3gyiksbv')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
				<section id="rooms">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $post): ?>
    				<div class="item clearfix">
<?php if ($post->thumbnailSrc): ?>
            <article id="room-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> thumbnail pf-page">
<?php else: ?>
            <article id="room-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> no-thumbnail pf-page">
<?php endif ?>
              
            
      					<header class="entry-header">
<?php if ($post->thumbnailSrc): ?>
      						  <div class="entry-thumbnail">
      								<div class="entry-thumb-img">
      									<a href="<?php echo htmlSpecialChars($post->permalink) ?>"><img src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=280&h=110" alt="" /></a>
      								</div>
      							</div>
<?php endif ?>
      					</header><!-- .entry-header -->
      
<?php if ($post->thumbnailSrc): ?>
                <h2 class="entry-title"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>
<?php else: ?>
                <h2 class="entry-title no-thumbnail"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>
<?php endif ?>
      
<?php if ($site->isSearch): ?>
        					<div class="entry-summary">
        						<?php echo NTemplateHelpers::escapeHtml($post->excerpt, ENT_NOQUOTES) ?>

        					</div><!-- .entry-summary -->
<?php else: if ($post->thumbnailSrc): ?>
      					   <div class="entry-content thumbnail">
<?php else: ?>
      					   <div class="entry-content no-thumbnail"> 
<?php endif ?>
      						       						<!-- HERE -->
      							      						<!-- HERE -->
<?php 
			$a = array();
			if(empty($a)){
				wp_link_pages(array(
					"before" => "<div class=\"page-link\"><span>" . __("Pages:", THEME_CODE_NAME) . "</span>",
					"after" => "</div>"
				));
			}else{
				wp_link_pages(array(
					"before" => $a[1] . "<span>" . __($a[0], THEME_CODE_NAME) . "</span>",
					"after" => $a[2]
				));
			}
			unset($a) ?>
      					   </div><!-- .entry-content -->
<?php endif ?>
                    <!-- /.entry-meta -->
              
    				</article><!-- /#post-<?php echo NTemplateHelpers::escapeHtmlComment($post->id) ?> -->
    				</div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
				</section>

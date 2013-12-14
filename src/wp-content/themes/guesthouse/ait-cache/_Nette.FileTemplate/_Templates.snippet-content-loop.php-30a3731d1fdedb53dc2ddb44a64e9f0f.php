<?php //netteCache[01]000369a:2:{s:4:"time";s:21:"0.38962000 1367374633";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:80:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-content-loop.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-content-loop.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '4awdg2lywi')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
				<section>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($posts) as $post): if ($post->thumbnailSrc): ?>
        <article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> thumbnail">
<?php else: ?>
        <article id="post-<?php echo htmlSpecialChars($post->id) ?>" class="<?php echo htmlSpecialChars($post->htmlClasses) ?> no-thumbnail">
<?php endif ?>
					<header class="entry-header">

<?php if ($post->thumbnailSrc): ?>
						<h2 class="entry-title thumbnail"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>
            	<div class="entry-thumbnail">
								
								<div class="entry-thumb-img">
<?php if ($site->isSearch): ?>
									<a href="<?php echo htmlSpecialChars($post->permalink) ?>"><img src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=50&h=50" alt="" /></a>
<?php else: ?>
								  <a href="<?php echo htmlSpecialChars($post->permalink) ?>"><img src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($post->thumbnailSrc) ?>&w=433&h=198" alt="" /></a>
<?php endif ?>
								</div>
							</div>
							
							
<?php else: ?>
							
								<h2 class="entry-title no-thumbnail"><a href="<?php echo htmlSpecialChars($post->permalink) ?>
" title="Permalink to <?php echo htmlSpecialChars($post->title) ?>" rel="bookmark"><?php echo NTemplateHelpers::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>
  						
<?php endif ?>

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
                <span><b>Comments: </b><?php echo NTemplateHelpers::escapeHtml($post->commentsCount, ENT_NOQUOTES) ?></span>
    
                
              </div>
            </div>

					</header><!-- .entry-header -->

<?php if ($site->isSearch): ?>
					<div class="entry-summary">
						<?php echo NTemplateHelpers::escapeHtml($post->excerpt, ENT_NOQUOTES) ?>

					</div><!-- .entry-summary -->
<?php else: if ($post->thumbnailSrc): ?>
					<div class="entry-content thumbnail">
<?php else: ?>
					<div class="entry-content no-thumbnail"> 
<?php endif ?>
						<?php echo $post->content ?>

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
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
				</section>
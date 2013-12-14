<?php //netteCache[01]000378a:2:{s:4:"time";s:21:"0.96467600 1367011211";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:89:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-custom-services-boxes.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-custom-services-boxes.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '6h108sz0dd')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!-- NEW SERVICE BOX LAYOUT :: START -->
<?php if ($boxes): ?>
  <div class="service-boxes clear">
    <div class="service-boxes-container">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($boxes) as $box): ?>
        <div class="service-box" id="sbox<?php echo htmlSpecialChars($iterator->counter) ?>">
          <div class="service-box-content" style="width: <?php echo htmlSpecialChars(NTemplateHelpers::escapeCss($box->options->boxWidth)) ?>px">
            <div class="service-box-image-mirror">
<?php if ($box->thumbnailSrc): ?>
              <div class="service-box-image-container" style="background: url('<?php echo $box->thumbnailSrc ?>
') no-repeat; width: <?php echo htmlSpecialChars(NTemplateHelpers::escapeCss($box->options->boxWidth)) ?>px; height: 120px;">
<?php else: ?>
              <div class="service-box-image-container" style="background: url('<?php echo $themeUrl ?>
/design/img/servicebox-0.png') no-repeat; width: <?php echo htmlSpecialChars(NTemplateHelpers::escapeCss($box->options->boxWidth)) ?>px; height: 120px;">
<?php endif ?>
                <div class="service-box-title-container">
                  <h2><a href="<?php echo htmlSpecialChars($box->options->boxLink) ?>
"><?php echo NTemplateHelpers::escapeHtml($box->title, ENT_NOQUOTES) ?></a></h2>
                </div>
              </div>
            </div>
            <p><?php echo NTemplateHelpers::escapeHtml($box->options->boxText, ENT_NOQUOTES) ?></p>
          </div>
        </div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </div>
  </div>
  <div class="separator-line"></div>
<?php endif ?>
<!-- NEW SERVICE BOX LAYOUT :: END -->
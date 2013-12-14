<?php //netteCache[01]000384a:2:{s:4:"time";s:21:"0.92109200 1367011211";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:95:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-custom-room-viewer-homepage.php";i:2;i:1367010652;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/snippet-custom-room-viewer-homepage.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, '1kth0xectt')
;
// snippets support
if (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>

<?php if ($rooms): ?>



<?php if ($options->roomViewerType == 'big'): ?>
<div class="slider-content">

<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
            <div class="slider">
<?php else: ?>
            <div class="slider defaultPageWidth">
<?php endif ?>

<div id="slider-container" class="slider-container">

	<div id="slider-delay" style="display:none"><?php echo $options->roomViewerDelay ?></div>
    <div id="slider-animTime" style="display:none"><?php echo $options->roomViewerAnimTime ?></div>
    <div id="slider-animType" style="display:none"><?php echo $options->roomViewerAnimation ?></div>
<?php if ($options->roomViewerHeight == 'auto'): ?>
    <div id="slider-height" style="display:none">430</div>
<?php else: ?>
    <div id="slider-height" style="display:none"><?php echo $options->roomViewerHeight ?></div>
<?php endif ?>

	<div id="main-background-slider-bottom" style="display:none;"><img src="#" alt="top" /></div>
    <div id="main-background-slider-top" style="display:none;"><img src="#" alt="bottom" /></div>

    <div id="preload--background-slider-images" style="display: none;">

    </div>
	<ul id="slider" class="slider slide clear">
<?php $j = 0 ;$iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($rooms) as $room): ?>
		<li>
<?php if ($room->thumbnailSrc): ?>
			  <img class="slider-container-img" src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($room->thumbnailSrc) ?>&amp;w=960&amp;h=398" alt="<?php echo htmlSpecialChars($room->options->roomDescription) ?>" />
<?php endif ;if (isset($room->options->roomDescriptionShort)): ?>
			<div class="caption">
			  <strong class="caption-title" style="font-weight:normal;"><?php echo $room->title ?></strong>
				<p><?php echo $room->options->roomDescriptionShort ?></p>
				</div>
<?php endif ?>
		</li> 
<?php $j++ ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</ul>

	<div class="room-options-container">
	   <div class="room-options-container-top">
        <div class="room-options-container-top-left"></div>
        <div class="room-options-container-top-right"></div>
     </div>
	   <div class="room-options-container-bottom" style="height:27px;">
	     <ul class="room-controls">
<?php if (isset($options->displayRoomReservation)): ?>
            <li>
              <a href="#" id="room-controls-1">
                <img src="<?php echo htmlSpecialChars($themeUrl) ?>/design/img/room-viewer-icon1.png" alt="Room Reservation" />
              <span><?php echo NTemplateHelpers::escapeHtml($options->roomReservationText, ENT_NOQUOTES) ?></span>
              </a>
            </li>
<?php endif ?>

<?php if (isset($options->displayRoomDescription)): ?>
            <li>
              <a href="#" id="room-controls-2">
                <img src="<?php echo htmlSpecialChars($themeUrl) ?>/design/img/room-viewer-icon2.png" alt="Room Description" />
              <span><?php echo NTemplateHelpers::escapeHtml($options->roomDescriptionText, ENT_NOQUOTES) ?></span>
              </a>
            </li>
<?php endif ?>

<?php if (isset($options->displayRoomAdditionalServices)): ?>
            <li>
              <a href="<?php echo htmlSpecialChars($options->roomCustomServicesLink) ?>"  id="room-controls-3">
                <img src="<?php echo htmlSpecialChars($options->roomCustomServicesImage) ?>
" alt="<?php echo htmlSpecialChars($options->roomCustomServicesText) ?>" />
              <span><?php echo NTemplateHelpers::escapeHtml($options->roomCustomServicesText, ENT_NOQUOTES) ?></span>
              </a>
            </li>
<?php endif ?>
        </ul>
     </div>
	</div>

	<div class="room-description-container" style="top:344px;"></div>

</div><!-- end of slider -->

</div>
<?php if ($site->isHomepage): ?>
            <div class="white-space"></div>
<?php else: ?>
            <div class="white-space-sub"></div>
<?php endif ?>
            </div>
          </div>
          
<?php elseif ($options->roomViewerType == 'small'): ?>

<div class="slider-content">

<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
            <div class="slider">
<?php else: ?>
            <div class="slider defaultPageWidth">
<?php endif ?>

<!-- TOOLBAR -->  
<div class="toolbar">
  <div class="defaultContentWidth">
    <div id="breadcrumb"><?php echo WpLatteFunctions::breadcrumbs(array()) ?></div>
  </div> 
</div>
<!-- TOOLBAR -->
<div id="slider-container" class="slider-container subpage-slider-container">

	<div id="slider-delay" style="display:none"><?php echo $options->roomViewerDelay ?></div>
    <div id="slider-animTime" style="display:none"><?php echo $options->roomViewerAnimTime ?></div>
    <div id="slider-animType" style="display:none"><?php echo $options->roomViewerAnimation ?></div>
<?php if ($options->roomViewerHeight == 'auto'): ?>
    <div id="slider-height" style="display:none"></div>
<?php else: ?>
    <div id="slider-height" style="display:none"><?php echo $options->roomViewerHeight ?></div>
<?php endif ?>
    
	<div id="main-background-slider-bottom" style="display:none;"><img src="#" alt="top" /></div>
    <div id="main-background-slider-top" style="display:none;"><img src="#" alt="bottom" /></div>

    <div id="preload--background-slider-images" style="display: none;">

    </div>

	<ul id="slider" class="subslider slide clear">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($rooms) as $room): ?>
		<li>
<?php if ($room->thumbnailSrc): ?>
			  <img class="slider-container-img" src="<?php echo htmlSpecialChars($timthumbUrl) ?>
?src=<?php echo htmlSpecialChars($room->thumbnailSrc) ?>&w=960&h=280" alt="<?php echo htmlSpecialChars($room->options->roomDescriptionShort) ?>" />
<?php endif ?>

<?php if (isset($room->options->roomDescriptionShort)): ?>
			<div class="caption">
			  <strong class="caption-title" style="font-weight:normal;"><?php echo $room->title ?></strong>
        <p><?php echo $room->options->roomDescriptionShort ?></p>
      </div>
<?php endif ?>
		</li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</ul>


	<div id="subpage-room-options-container" class="room-options-container subpage-room-options-container">
	   
     <div id="subpage-room-options-container-left" class="room-options-container-left subpage-room-options-container-left">

       <h4 class="subpage-room-data-title"><?php echo NTemplateHelpers::escapeHtml($options->roomReservationText, ENT_NOQUOTES) ?></h4>
       <div class="room-data subpage-room-data">
         <div class="reservation-form subpage-reservation-form">
           <div id="subpage-room-data-description" class="subpage-room-data-description"><h5></h5></div>
         </div>                                                                                                                              
       </div>
     </div>
     <img id="showHideHousing" class="container-control show" src="<?php echo htmlSpecialChars($themeUrl) ?>/design/img/ico_close_off.png" alt="Show-Hide" />
	</div>

</div><!-- end of slider -->

</div>
<?php if ($site->isHomepage): ?>
            <div class="white-space"></div>
<?php else: ?>
            <div class="white-space-sub"></div>
<?php endif ?>
            </div>
          </div>

<?php else: ?>

<div class="slider-content no-slider">

<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
            <div class="slider">
<?php else: ?>
            <div class="slider defaultPageWidth">
<?php endif ?>

<!-- TOOLBAR -->  
<div class="toolbar">
  <div class="defaultContentWidth">
    <div id="breadcrumb"><?php echo WpLatteFunctions::breadcrumbs(array()) ?></div>
  </div> 
</div>
<!-- TOOLBAR -->
<div id="no-slider" class="slider-container subpage-slider-container" style="margin-bottom: 0px">
</div>

</div>
<?php if ($site->isHomepage): ?>
            <div class="white-space" style="background: none; height: 30px"></div>
<?php else: ?>
            <div class="white-space-sub" style="background: none; height: 30px"></div>
<?php endif ?>
            </div>
          </div>

<?php endif ?>

<?php endif ;

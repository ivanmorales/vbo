<?php //netteCache[01]000360a:2:{s:4:"time";s:21:"0.59165600 1375911814";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:9:"checkFile";}i:1;s:71:"/var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-layout.php";i:2;i:1375911812;}i:1;a:3:{i:0;a:2:{i:0;s:6:"NCache";i:1;s:10:"checkConst";}i:1;s:20:"NFramework::REVISION";i:2;s:30:"eee17d5 released on 2011-08-13";}}}?><?php

// source file: /var/data/wwwvbo/wp-content/themes/guesthouse/Templates/main-layout.php

?><?php list($_l, $_g) = NCoreMacros::initRuntime($template, 'li0m0bk7mn')
;//
// block room
//
if (!function_exists($_l->blocks['room'][] = '_lbd22104cb4b_room')) { function _lbd22104cb4b_room($_l, $_args) { extract($_args)
;NCoreMacros::includeTemplate("snippet-custom-room-viewer.php", array('options' => $themeOptions->globals, 'rooms' => $site->create('room', $themeOptions->globals->roomViewerCat)) + $template->getParams(), $_l->templates['li0m0bk7mn'])->render() ;
}}

//
// block sectionA
//
if (!function_exists($_l->blocks['sectionA'][] = '_lb061a852378_sectionA')) { function _lb061a852378_sectionA($_l, $_args) { extract($_args)
?>
    <!-- CONTENT -->
<?php NUIMacros::callBlock($_l, 'content', $template->getParams()) ?>
		<!-- end of page-content -->
<?php
}}

//
// block sectionB
//
if (!function_exists($_l->blocks['sectionB'][] = '_lbef952f498f_sectionB')) { function _lbef952f498f_sectionB($_l, $_args) { extract($_args)
?>
		<!-- SERVICES -->
<?php //
// block service-boxes
//
if (!function_exists($_l->blocks["service-boxes"][] = '_lb9d32d944f2_service_boxes')) { function _lb9d32d944f2_service_boxes($_l, $_args) { extract($_args) ;NCoreMacros::includeTemplate("snippet-custom-services-boxes.php", array('boxes' => $site->create('service-box', $themeOptions->globals->globalServiceBoxes)) + $template->getParams(), $_l->templates['li0m0bk7mn'])->render() ;}} call_user_func(reset($_l->blocks["service-boxes"]), $_l, get_defined_vars()) ;
}}

//
// block sectionC
//
if (!function_exists($_l->blocks['sectionC'][] = '_lb0f92504cb8_sectionC')) { function _lb0f92504cb8_sectionC($_l, $_args) { extract($_args)
;call_user_func(reset($_l->blocks['staticText']), $_l, get_defined_vars()) ; 
}}

//
// block staticText
//
if (!function_exists($_l->blocks['staticText'][] = '_lbc896556e36_staticText')) { function _lbc896556e36_staticText($_l, $_args) { extract($_args)
?>
		<div class="tooltip-icons">
			<div class="text defaultContentWidth clear">
				<div class="text-inside">
				<?php echo do_shortcode($themeOptions->globals->staticText) ?>

				</div>
			</div>
		</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extends) ? FALSE : $template->_extends; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return NUIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!doctype html>
<html class="no-js" lang="<?php echo htmlSpecialChars($site->language) ?>">
<head>
	<meta charset="<?php echo htmlSpecialChars($site->charset) ?>" />
	<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=<?php echo htmlSpecialChars($site->charset) ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo WpLatteFunctions::getTitle() ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php echo htmlSpecialChars($site->pingbackUrl) ?>" />

<?php if ($themeOptions->fonts->fancyFont->type == 'google'): ?>
	<link href="http://fonts.googleapis.com/css?family=<?php echo htmlSpecialChars($themeOptions->fonts->fancyFont->font) ?>" rel="stylesheet" type="text/css" />
<?php endif ?>

	<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="<?php echo WpLatteFunctions::lessify() ?>" />
<?php if(is_singular() && get_option("thread_comments")){wp_enqueue_script("comment-reply");}wp_head() ?>

	<script type="text/javascript" src="<?php echo htmlSpecialChars($themeJsUrl) ?>/jquery.foobar.2.1.js"></script>
<?php if (!empty($themeOptions->general->gmaps_api_key)): ?>
	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo $themeOptions->general->gmaps_api_key ?>"></script>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($themeJsUrl) ?>/libs/jquery.gmap-1.1.0-min.js"></script>
<?php endif ?>
</head>
<body class="<?php echo join(' ', get_body_class()) . ' ' . join(' ', array($bodyClasses, 'ait-guesthouse')) ?>
" data-themeurl="<?php echo htmlSpecialChars($themeUrl) ?>">
<?php NCoreMacros::includeTemplate("analyticstracking.php", $template->getParams(), $_l->templates['li0m0bk7mn'])->render() ?>
<!-- DROPDOWN CONTACT -->
<?php if ($themeOptions->globals->dropdownPanelText != ""): ?>
<div id="dropdown-panel" class="dropdown-panel clear" style="display: none">
  <div id="dropdown-panel-speed" style="display: none"><?php echo $themeOptions->globals->dropdownPanelSpeed ?></div>
  <div class="dropdown-panel-content">
      <!-- DROPDOWN WIDGET COLUMN 1 :: START -->
        <div id="1" class="dropdown-panel-widget-col widget-col-1" style="width: <?php echo $themeOptions->globals->dropdownWidthFirst ?>">
<?php dynamic_sidebar("dropdown-panel-widget-col-1") ?>
        </div>
      <!-- DROPDOWN WIDGET COLUMN 1 :: END -->

      <!-- DROPDOWN WIDGET COLUMN 2 :: START -->
        <div id="2" class="dropdown-panel-widget-col widget-col-2" style="width: <?php echo $themeOptions->globals->dropdownWidthSecond ?>">
<?php dynamic_sidebar("dropdown-panel-widget-col-2") ?>
        </div>
      <!-- DROPDOWN WIDGET COLUMN 2 :: END -->

      <!-- DROPDOWN WIDGET COLUMN 3:: START -->
        <div id="3" class="dropdown-panel-widget-col widget-col-3" style="width: <?php echo $themeOptions->globals->dropdownWidthThird ?>; margin-right: 0px"> 
<?php dynamic_sidebar("dropdown-panel-widget-col-3") ?>
        </div>
      <!-- DROPDOWN WIDGET COLUMN 3 :: END -->
  </div>
</div>
<?php endif ?>
<!-- DROPDOWN CONTACT -->


<div class="mainpage">
  <!-- HEADER -->
<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
  <header class="header">
<?php else: ?>
  <header class="header defaultPageWidth">
<?php endif ?>
    <div class="header-layout">
<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>

        <div class="pattern">
        <div class="background">
<?php else: ?>

        <div class="pattern defaultPageWidth">
        <div class="background defaultPageWidth">
<?php endif ?>

        <div class="header-container">
          <div class="header-content defaultContentWidth">
            <div class="logo">
              <!--<img src="design/img/logo.png" />-->
<?php if (!empty($themeOptions->general->logo_img)): ?>
    				    <a href="<?php echo htmlSpecialChars($homeUrl) ?>"><img src="<?php echo htmlSpecialChars($themeOptions->general->logo_img) ?>" alt="logo" /></a>
<?php else: ?>
                <a href="<?php echo htmlSpecialChars($homeUrl) ?>"><span><?php echo NTemplateHelpers::escapeHtml($themeOptions->general->logo_text, ENT_NOQUOTES) ?></span></a>
<?php endif ?>
            </div>
            <div id="mainmenu-dropdown-duration" style="display: none;"><?php echo NTemplateHelpers::escapeHtml($themeOptions->globals->mainmenu_dropdown_time, ENT_NOQUOTES) ?></div>
			      <div id="mainmenu-dropdown-easing" style="display: none;"><?php echo NTemplateHelpers::escapeHtml($themeOptions->globals->mainmenu_dropdown_animation, ENT_NOQUOTES) ?></div>
<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'fallback_cb' => 'default_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu clear')) ?>
            
            <!-- WPML plugin required -->
<?php if (function_exists('icl_get_languages')): if (icl_get_languages('skip_missing=0')): ?>
          	  <ul class="flags">
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator(icl_get_languages('skip_missing=0')) as $lang): ?>
                  	<li><a href="<?php echo htmlSpecialChars($lang['url']) ?>" class="<?php if ($lang['active'] == 1): ?>
active<?php endif ?>"><img src="<?php echo htmlSpecialChars($lang['country_flag_url']) ?>
" alt="<?php echo htmlSpecialChars($lang['translated_name']) ?>" /></a></li>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
              </ul>
<?php endif ;endif ?>
      	    <!-- WPML plugin required -->
      	    
            <!-- DROPDOWN CONTACT CONTROLS -->
<?php if (isset($themeOptions->globals->dropdownPanelShow)): ?>
            <div class="dropdown-panel-control">
              <div class="dropdown-content">
               <div class="dropdown-panel-control-button" style="display:none;">
                  <?php if ($themeOptions->globals->dropdownPanelText != ""): ?>
<h5 class="dropdown-panel-control-button-content btn-drop"><?php echo $themeOptions->globals->dropdownPanelText ?>
</h5><?php endif ?>

               </div>
               <div class="dropdown-panel-control-content">
                  <?php if ($themeOptions->globals->dropdownPanelImage != ""): ?>
<a href="<?php echo $themeOptions->globals->dropdownPanelAction ?>" onClick="_gaq.push(['_trackEvent', 'VBO', 'Click', 'CTA Top'])"><img src="<?php echo $themeOptions->globals->dropdownPanelImage ?>
" /></a><?php endif ?>

               </div>
              </div>
              <div class="dropdown-panel-teeth-container">
                 <div class="dropdown-panel-teeth">
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                   <div class="tooth"></div>
                 </div>
               </div>
            </div>
<?php endif ?>
            <!-- DROPDOWN CONTACT CONTROLS -->
          </div>

        </div>
  
<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['room']), $_l, get_defined_vars()); } ?>
            
    </div>
    </div>
	</header>

<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
  <div class="content">
<?php else: ?>
	<div class="content defaultPageWidth">
<?php endif ?>




<?php if (!isset($sectionsOrder)): $sectionsOrder = $themeOptions->globals->sectionsOrder ;endif ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new NSmartCachingIterator($sectionsOrder) as $section): if ($section == 'content'): call_user_func(reset($_l->blocks['sectionA']), $_l, $template->getParams()) ;elseif ($section == 'serviceBoxes'): call_user_func(reset($_l->blocks['sectionB']), $_l, $template->getParams()) ;elseif ($section == 'staticText'): call_user_func(reset($_l->blocks['sectionC']), $_l, $template->getParams()) ;endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
	</div>

	<!-- FOOTER -->
<?php if ($themeOptions->general->layoutStyle == 'wide'): ?>
	<footer class="footer">
<?php else: ?>
	<footer class="footer defaultPageWidth">
<?php endif ?>

		<div class="footer-widgets clear">
		  <style type="text/css" scoped="scoped">
		  .footer-widgets .col-1 { width: <?php echo $themeOptions->globals->footerWidthFirst ?> }
		  .footer-widgets .col-2 { width: <?php echo $themeOptions->globals->footerWidthSecond ?> }
		  .footer-widgets .col-3 { width: <?php echo $themeOptions->globals->footerWidthThird ?> }
		  .footer-widgets .col-4 { width: <?php echo $themeOptions->globals->footerWidthFourth ?> }
		  .footer-widgets .col-5 { width: <?php echo $themeOptions->globals->footerWidthFifth ?> }
		  .footer-widgets .col-6 { width: <?php echo $themeOptions->globals->footerWidthSixth ?> }
		  </style>
      <div class="footer-widgets-container">
<?php dynamic_sidebar("footer-widgets-area") ?>
			</div>
		</div>
            <div class="footer-logos clear" style="margin: 20px auto 25px; padding: 2px; width: 496px; border-radius: 2px; background: #FFF">
            <img src="/wp-content/themes/guesthouse/images/members-of.png" width="196" height="96" border="0" alt="" style="float: left;" />
            <a href="http://www.caturgua.com/eng_index.aspx" target="_blank"><img src="/wp-content/themes/guesthouse/images/caturgua.png" width="153" height="96" border="0" alt="" style="float: left;" /></a>
            <a href="http://www.visitcostarica.com/ict/paginas/hoteles/HotDetalle.asp?idHotel=675" target="_blank"><img src="/wp-content/themes/guesthouse/images/ict.png" width="147" height="96" border="0" alt="" style="float: left;" /></a>
            </div>

		<div class="footer-links clear">
      <div class="copyright"><?php echo do_shortcode($themeOptions->general->footer_text) ?></div>
			<div class="links">
<?php wp_nav_menu(array('theme_location' => 'footer-menu','fallback_cb' => 'default_footer_menu', 'container' => 'nav', 'container_class' => 'footer-menu', 'menu_class' => 'menu clear', 'depth' => 1)) ?>
			</div>
		</div>
	</footer><!-- end of footer -->
</div><!-- end of mainpage -->

<?php if (isset($themeOptions->general->displayThemebox)): NCoreMacros::includeTemplate("$themeboxDir/ThemeBoxTemplate.php", $template->getParams(), $_l->templates['li0m0bk7mn'])->render() ;endif ?>

<?php wp_footer() ?>

<?php if ($themeOptions->fonts->fancyFont->type == 'cufon' or $themeOptions->general->displayThemebox): 
			$__cufon = array('fonts',
		'fancyFont',
		"$themeUrl/design/js/libs/cufon.js",
		THEME_FONTS_URL . "/{$themeOptions->fonts->fancyFont->file}",
		$themeOptions->fonts->fancyFont->font,
		$themeOptions->general->displayThemebox) ?>
			<script id="ait-cufon-script" src="<?php echo $__cufon[2] ?>"></script>
			<?php
			$__tbCookie = @strstr($_COOKIE['aitThemeBox-' .THEME_CODE_NAME], 'Type\":\"google\"');
			if($__tbCookie === false and substr($__cufon[3], -3, 3) == '.js'): ?>
			<script id="ait-cufon-font-script" src="<?php echo $__cufon[3] ?>"></script>
			<?php endif ?>

			<script id="ait-cufon-font-replace">
				<?php if($__cufon[5]): ?>
				var isCookie = false;
				try{
					var type = Cookies.get('<?php echo $__cufon[0] . ucfirst($__cufon[1]) . 'Type'?>');
					if(type == undefined || (type != undefined && type == 'cufon'))
						isCookie = true;
				}catch(e){
					isCookie = true;
				}

				if(isCookie != false){
				<?php endif ?>
					<?php $__font = WpLatteFunctions::getCssFontSelectors($__cufon[1])?>
					Cufon.now();
					<?php foreach($__font as $selectors => $values): ?>
					Cufon.replace('<?php echo $selectors ?>', {
						fontFamily: "<?php echo $__cufon[4]?>".replace(/\+/g, ' ')
						<?php if(isset($values['text-shadow'])): ?>, textShadow: '<?php echo $values['text-shadow'] ?>
'<?php endif ?>
						<?php if(isset($values['hover'])): ?>, hover: {<?php if(isset($values['hover']['color'])): ?>
color: '<?php echo $values['hover']['color'] ?>'<?php endif; if(isset($values['hover']['text-shadow'])): ?>
,textShadow: '<?php echo $values['hover']['text-shadow'] ?>'<?php endif ?>}
						<?php endif ?>
					});
					<?php endforeach ?>
				<?php if($__cufon[5]): ?>}<?php endif ?>
			</script><?php endif ?>


<?php if (isset($themeOptions->general->ga_code) && ($themeOptions->general->ga_code!="")): ?>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', <?php echo NTemplateHelpers::escapeJs($themeOptions->general->ga_code) ?>]);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php endif ?>

<script type="text/javascript" src="<?php echo htmlSpecialChars($themeJsUrl) ?>/libs/cluster.js"></script>
</body>

</html>
<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	NCoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}

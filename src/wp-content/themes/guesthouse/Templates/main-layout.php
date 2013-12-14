<!doctype html>
<html class="no-js" lang="{$site->language}">
<head>
	<meta charset="{$site->charset}">
	<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset={$site->charset}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{title}</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="{$site->pingbackUrl}">

	{if $themeOptions->fonts->fancyFont->type == 'google'}
	<link href="http://fonts.googleapis.com/css?family={$themeOptions->fonts->fancyFont->font}" rel="stylesheet" type="text/css">
	{/if}

	<link id="ait-style" rel="stylesheet" type="text/css" media="all" href="{less $site->stylesheetUrl}">
	{head}

	<script type="text/javascript" src="{$themeJsUrl}/jquery.foobar.2.1.js"></script>
	{if !empty($themeOptions->general->gmaps_api_key)}
	<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key={!$themeOptions->general->gmaps_api_key}"></script>
	<script type="text/javascript" src="{$themeJsUrl}/libs/jquery.gmap-1.1.0-min.js"></script>
    {/if}
</head>
<body class="{bodyClasses $bodyClasses, ait-guesthouse}" data-themeurl="{$themeUrl}">
{include "analyticstracking.php"}
<!-- DROPDOWN CONTACT -->
{if $themeOptions->globals->dropdownPanelText != ""}
<div id="dropdown-panel" class="dropdown-panel clear" style="display: none">
  <div id="dropdown-panel-speed" style="display: none">{!$themeOptions->globals->dropdownPanelSpeed}</div>
  <div class="dropdown-panel-content">
      <!-- DROPDOWN WIDGET COLUMN 1 :: START -->
        <div id="1" class="dropdown-panel-widget-col widget-col-1" style="width: {!$themeOptions->globals->dropdownWidthFirst}">
          {dynamicSidebar "dropdown-panel-widget-col-1"}
        </div>
      <!-- DROPDOWN WIDGET COLUMN 1 :: END -->

      <!-- DROPDOWN WIDGET COLUMN 2 :: START -->
        <div id="2" class="dropdown-panel-widget-col widget-col-2" style="width: {!$themeOptions->globals->dropdownWidthSecond}">
          {dynamicSidebar "dropdown-panel-widget-col-2"}
        </div>
      <!-- DROPDOWN WIDGET COLUMN 2 :: END -->

      <!-- DROPDOWN WIDGET COLUMN 3:: START -->
        <div id="3" class="dropdown-panel-widget-col widget-col-3" style="width: {!$themeOptions->globals->dropdownWidthThird}; margin-right: 0px"> 
          {dynamicSidebar "dropdown-panel-widget-col-3"}
        </div>
      <!-- DROPDOWN WIDGET COLUMN 3 :: END -->
  </div>
</div>
{/if}
<!-- DROPDOWN CONTACT -->


<div class="mainpage">
  <!-- HEADER -->
	{if $themeOptions->general->layoutStyle == 'wide'}
  <header class="header">
  {else}
  <header class="header defaultPageWidth">
  {/if}
    <div class="header-layout">
      {if $themeOptions->general->layoutStyle == 'wide'}

        <div class="pattern">
        <div class="background">
      {else}

        <div class="pattern defaultPageWidth">
        <div class="background defaultPageWidth">
      {/if}

        <div class="header-container">
          <div class="header-content defaultContentWidth">
            <div class="logo">
              <!--<img src="design/img/logo.png" />-->
              {if !empty($themeOptions->general->logo_img)}
    				    <a href="{$homeUrl}"><img src="{$themeOptions->general->logo_img}" alt="logo" /></a>
    				  {else}
                <a href="{$homeUrl}"><span>{$themeOptions->general->logo_text}</span></a>
              {/if}
            </div>
            <div id="mainmenu-dropdown-duration" style="display: none;">{$themeOptions->globals->mainmenu_dropdown_time}</div>
			      <div id="mainmenu-dropdown-easing" style="display: none;">{$themeOptions->globals->mainmenu_dropdown_animation}</div>
            {menu 'theme_location' => 'primary_menu', 'fallback_cb' => 'default_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu clear'}
            
            <!-- WPML plugin required -->
            {if function_exists(icl_get_languages)}
              {if icl_get_languages('skip_missing=0')}
          	  <ul class="flags">
              	{foreach icl_get_languages('skip_missing=0') as $lang}
                  	<li><a href="{$lang['url']}" class="{if $lang['active'] == 1}active{/if}"><img src="{$lang['country_flag_url']}" alt="{$lang['translated_name']}" /></a></li>
                {/foreach}
              </ul>
              {/if}
            {/if}
      	    <!-- WPML plugin required -->
      	    
            <!-- DROPDOWN CONTACT CONTROLS -->
            {if isset($themeOptions->globals->dropdownPanelShow)}
            <div class="dropdown-panel-control">
              <div class="dropdown-content">
               <div class="dropdown-panel-control-button" style="display:none;">
                  {if $themeOptions->globals->dropdownPanelText != ""}<h5 class="dropdown-panel-control-button-content btn-drop">{!$themeOptions->globals->dropdownPanelText}</h5>{/if}
               </div>
               <div class="dropdown-panel-control-content">
                  {if $themeOptions->globals->dropdownPanelImage != ""}<a href="{!$themeOptions->globals->dropdownPanelAction}" onClick="_gaq.push(['_trackEvent', 'VBO', 'Click', 'CTA Top'])"><img src="{!$themeOptions->globals->dropdownPanelImage}"/></a>{/if}
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
            {/if}
            <!-- DROPDOWN CONTACT CONTROLS -->
          </div>

        </div>
  
      {block room}
				{include snippet-custom-room-viewer.php, options => $themeOptions->globals, rooms => $site->create('room', $themeOptions->globals->roomViewerCat)}
			{/block}
            
    </div>
    </div>
	</header>

  {if $themeOptions->general->layoutStyle == 'wide'}
  <div class="content">
	{else}
	<div class="content defaultPageWidth">
	{/if}

	{define sectionA}
    <!-- CONTENT -->
		{include #content}
		<!-- end of page-content -->
	{/define}

	{define sectionB}
		<!-- SERVICES -->
		{block service-boxes}
			 {include snippet-custom-services-boxes.php, boxes => $site->create('service-box', $themeOptions->globals->globalServiceBoxes)}
		{/block}
	{/define}

	{define sectionC}
		{block staticText}
		<div class="tooltip-icons">
			<div class="text defaultContentWidth clear">
				<div class="text-inside">
				{doShortcode $themeOptions->globals->staticText}
				</div>
			</div>
		</div>
		{/block}
	{/define}

	{if !isset($sectionsOrder)}
		{var $sectionsOrder = $themeOptions->globals->sectionsOrder}
	{/if}

	{foreach $sectionsOrder as $section}
		{if $section == 'content'}
			{include #sectionA}
		{elseif $section == 'serviceBoxes'}
			{include #sectionB}
		{elseif $section == 'staticText'}
			{include #sectionC}
		{/if}
	{/foreach}
	</div>

	<!-- FOOTER -->
	{if $themeOptions->general->layoutStyle == 'wide'}
	<footer class="footer">
	{else}
	<footer class="footer defaultPageWidth">
  {/if}

		<div class="footer-widgets clear">
		  <style type="text/css" scoped="scoped">
		  .footer-widgets .col-1 { width: {!$themeOptions->globals->footerWidthFirst} }
		  .footer-widgets .col-2 { width: {!$themeOptions->globals->footerWidthSecond} }
		  .footer-widgets .col-3 { width: {!$themeOptions->globals->footerWidthThird} }
		  .footer-widgets .col-4 { width: {!$themeOptions->globals->footerWidthFourth} }
		  .footer-widgets .col-5 { width: {!$themeOptions->globals->footerWidthFifth} }
		  .footer-widgets .col-6 { width: {!$themeOptions->globals->footerWidthSixth} }
		  </style>
      <div class="footer-widgets-container">
			{dynamicSidebar "footer-widgets-area"}
			</div>
		</div>
            <div class="footer-logos clear" style="margin: 20px auto 25px; padding: 2px; width: 496px; border-radius: 2px; background: #FFF">
            <img src="/wp-content/themes/guesthouse/images/members-of.png" width="196" height="96" border="0" alt="" style="float: left;" />
            <a href="http://www.caturgua.com/eng_index.aspx" target="_blank"><img src="/wp-content/themes/guesthouse/images/caturgua.png" width="153" height="96" border="0" alt="" style="float: left;" /></a>
            <a href="http://www.visitcostarica.com/ict/paginas/hoteles/HotDetalle.asp?idHotel=675" target="_blank"><img src="/wp-content/themes/guesthouse/images/ict.png" width="147" height="96" border="0" alt="" style="float: left;" /></a>
            </div>

		<div class="footer-links clear">
      <div class="copyright">{doShortcode $themeOptions->general->footer_text}</div>
			<div class="links">
               {menu 'theme_location' => 'footer-menu','fallback_cb' => 'default_footer_menu', 'container' => 'nav', 'container_class' => 'footer-menu', 'menu_class' => 'menu clear', 'depth' => 1 }
			</div>
		</div>
	</footer><!-- end of footer -->
</div><!-- end of mainpage -->

{ifset $themeOptions->general->displayThemebox}
	{include "$themeboxDir/ThemeBoxTemplate.php"}
{/ifset}

{footer}

{if $themeOptions->fonts->fancyFont->type == 'cufon' or $themeOptions->general->displayThemebox}
	{cufon
		fonts,
		fancyFont,
		"$themeUrl/design/js/libs/cufon.js",
		THEME_FONTS_URL . "/{$themeOptions->fonts->fancyFont->file}",
		$themeOptions->fonts->fancyFont->font,
		$themeOptions->general->displayThemebox
	}
{/if}


{if isset($themeOptions->general->ga_code) && ($themeOptions->general->ga_code!="")}
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', {$themeOptions->general->ga_code}]);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
{/if}

<script type="text/javascript" src="{$themeJsUrl}/libs/cluster.js"></script>
</body>

</html>

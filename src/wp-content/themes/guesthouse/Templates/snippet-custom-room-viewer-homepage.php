
{if $rooms}



{if $options->roomViewerType == big}
<div class="slider-content">

            {if $themeOptions->general->layoutStyle == 'wide'}
            <div class="slider">
            {else}
            <div class="slider defaultPageWidth">
            {/if}

<div id="slider-container" class="slider-container">

	<div id="slider-delay" style="display:none">{!$options->roomViewerDelay}</div>
    <div id="slider-animTime" style="display:none">{!$options->roomViewerAnimTime}</div>
    <div id="slider-animType" style="display:none">{!$options->roomViewerAnimation}</div>
    {if $options->roomViewerHeight == 'auto'}
    <div id="slider-height" style="display:none">430</div>
    {else}
    <div id="slider-height" style="display:none">{!$options->roomViewerHeight}</div>
    {/if}

	<div id="main-background-slider-bottom" style="display:none;"><img src="#" alt="top" /></div>
    <div id="main-background-slider-top" style="display:none;"><img src="#" alt="bottom" /></div>

    <div id="preload--background-slider-images" style="display: none;">

    </div>
	<ul id="slider" class="slider slide clear">
		{var $j = 0}
    {foreach $rooms as $room}
		<li>
			{if $room->thumbnailSrc}
			  <img class="slider-container-img" src="{$timthumbUrl}?src={$room->thumbnailSrc}&amp;w=960&amp;h=398" alt="{$room->options->roomDescription}" />
			{/if}
			{ifset $room->options->roomDescriptionShort}
			<div class="caption">
			  <strong class="caption-title" style="font-weight:normal;">{!$room->title}</strong>
				<p>{!$room->options->roomDescriptionShort}</p>
				</div>
			{/ifset}
		</li> 
		{var $j++}
		{/foreach}
	</ul>

	<div class="room-options-container">
	   <div class="room-options-container-top">
        <div class="room-options-container-top-left"></div>
        <div class="room-options-container-top-right"></div>
     </div>
	   <div class="room-options-container-bottom" style="height:27px;">
	     <ul class="room-controls">
          {if isset($options->displayRoomReservation)}
            <li>
              <a href="#" id="room-controls-1">
                <img src="{$themeUrl}/design/img/room-viewer-icon1.png" alt="Room Reservation">
              <span>{$options->roomReservationText}</span>
              </a>
            </li>
          {/if}

          {if isset($options->displayRoomDescription)}
            <li>
              <a href="#" id="room-controls-2">
                <img src="{$themeUrl}/design/img/room-viewer-icon2.png" alt="Room Description">
              <span>{$options->roomDescriptionText}</span>
              </a>
            </li>
          {/if}

          {if isset($options->displayRoomAdditionalServices)}
            <li>
              <a href="{$options->roomCustomServicesLink}"  id="room-controls-3">
                <img src="{$options->roomCustomServicesImage}" alt="{$options->roomCustomServicesText}">
              <span>{$options->roomCustomServicesText}</span>
              </a>
            </li>
          {/if}
        </ul>
     </div>
	</div>

	<div class="room-description-container" style="top:344px;"></div>

</div><!-- end of slider -->

</div>
            {if $site->isHomepage}
            <div class="white-space"></div>
            {else}
            <div class="white-space-sub"></div>
            {/if}
            </div>
          </div>
          
{elseif $options->roomViewerType == small}

<div class="slider-content">

            {if $themeOptions->general->layoutStyle == 'wide'}
            <div class="slider">
            {else}
            <div class="slider defaultPageWidth">
            {/if}

<!-- TOOLBAR -->  
<div class="toolbar">
  <div class="defaultContentWidth">
    <div id="breadcrumb">{breadcrumbs}</div>
  </div> 
</div>
<!-- TOOLBAR -->
<div id="slider-container" class="slider-container subpage-slider-container">

	<div id="slider-delay" style="display:none">{!$options->roomViewerDelay}</div>
    <div id="slider-animTime" style="display:none">{!$options->roomViewerAnimTime}</div>
    <div id="slider-animType" style="display:none">{!$options->roomViewerAnimation}</div>
    {if $options->roomViewerHeight == auto}
    <div id="slider-height" style="display:none"></div>
    {else}
    <div id="slider-height" style="display:none">{!$options->roomViewerHeight}</div>
    {/if}
    
	<div id="main-background-slider-bottom" style="display:none;"><img src="#" alt="top" /></div>
    <div id="main-background-slider-top" style="display:none;"><img src="#" alt="bottom" /></div>

    <div id="preload--background-slider-images" style="display: none;">

    </div>

	<ul id="slider" class="subslider slide clear">
		{foreach $rooms as $room}
		<li>
			{if $room->thumbnailSrc}
			  <img class="slider-container-img" src="{$timthumbUrl}?src={$room->thumbnailSrc}&w=960&h=280" alt="{$room->options->roomDescriptionShort}" />
			{/if}

			{ifset $room->options->roomDescriptionShort}
			<div class="caption">
			  <strong class="caption-title" style="font-weight:normal;">{!$room->title}</strong>
        <p>{!$room->options->roomDescriptionShort}</p>
      </div>
      {/ifset}
		</li>
		{/foreach}
	</ul>


	<div id="subpage-room-options-container" class="room-options-container subpage-room-options-container">
	   
     <div id="subpage-room-options-container-left" class="room-options-container-left subpage-room-options-container-left">

       <h4 class="subpage-room-data-title">{$options->roomReservationText}</h4>
       <div class="room-data subpage-room-data">
         <div class="reservation-form subpage-reservation-form">
           <div id="subpage-room-data-description" class="subpage-room-data-description"><h5></h5></div>
         </div>                                                                                                                              
       </div>
     </div>
     <img id="showHideHousing" class="container-control show" src="{$themeUrl}/design/img/ico_close_off.png" alt="Show-Hide" />
	</div>

</div><!-- end of slider -->

</div>
            {if $site->isHomepage}
            <div class="white-space"></div>
            {else}
            <div class="white-space-sub"></div>
            {/if}
            </div>
          </div>

{else}

<div class="slider-content no-slider">

            {if $themeOptions->general->layoutStyle == 'wide'}
            <div class="slider">
            {else}
            <div class="slider defaultPageWidth">
            {/if}

<!-- TOOLBAR -->  
<div class="toolbar">
  <div class="defaultContentWidth">
    <div id="breadcrumb">{breadcrumbs}</div>
  </div> 
</div>
<!-- TOOLBAR -->
<div id="no-slider" class="slider-container subpage-slider-container" style="margin-bottom: 0px">
</div>

</div>
            {if $site->isHomepage}
            <div class="white-space" style="background: none; height: 30px"></div>
            {else}
            <div class="white-space-sub" style="background: none; height: 30px"></div>
            {/if}
            </div>
          </div>

{/if}

{/if}

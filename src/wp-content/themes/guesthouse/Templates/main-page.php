{extends 'main-layout.php'}

{var $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null}

{block content}

<!-- SUBPAGE -->
<div class="subpage-title-container defaultContentWidth">
  <h1>{$post->title}</h1>
</div>

<div class="separator-line-new"></div>


<div id="container" class="subpage defaultContentWidth subpage-line clear">  
  <!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			{if $post->thumbnailSrc != false }
			<div class="entry-thumbnail" style="margin-bottom:10px;">
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=650&h=390" alt="" />
			</div>
			{/if}

			{!$post->content}

			{*include snippet-comments.php*}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">

{dynamicSidebar "subpages-sidebar"}

	</div><!-- end of sidebar -->

</div><!-- end of container -->

{/block}

{? isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xr'}
{define $localViewer}
	{include snippet-custom-room-viewer.php, options => $post->options('page_room'), rooms => $site->create('room', $post->options('page_room')->roomViewerCat)}
{/define}

{? isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xs'}
{define $localService}
	{include snippet-custom-services-boxes.php, boxes => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)}
{/define}

{? !empty($post->options('page_static_text')->staticText) ? $localStaticText = 'staticText' : $localStaticText = 'xt'}

{define $localStaticText}
      <div class="text defaultContentWidth clear">
        {doShortcode $post->options('page_static_text')->staticText}
      </div>
{/define}
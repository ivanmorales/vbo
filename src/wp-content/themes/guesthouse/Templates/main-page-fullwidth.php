{extends 'main-layout.php'}

{var $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null}

{block content}

<!-- SUBPAGE -->
<div id="container" class="clear onecolumn">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content defaultContentWidth">
		<div id="content-wrapper">
			<h1>{$post->title}</h1>

			{if $post->thumbnailSrc != false }
			<div class="entry-thumbnail">
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=640&h=200" alt="" />
			</div>
			{/if}

			{!$post->content}

			{*include snippet-comments.php*}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

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

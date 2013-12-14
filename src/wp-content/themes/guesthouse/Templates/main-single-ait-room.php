{extends 'main-layout.php'}

{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		<div id="content-wrapper">
			<h1>{$post->title}</h1>

      <div class="postitem clear">
			{if !isset($post->options('post_featured_images')->hideFeatured)}
			{if $post->thumbnailSrc != false }
			<a href="{$post->thumbnailSrc}">
			<div class="entry-thumbnail">
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=650&h=390" alt="" />
			</div>
			</a>
			{/if}
			{/if}
      </div>
			<div class="entry-content">
				{!$post->content}
			</div>





			{include 'snippet-post-nav.php' location=> nav-above}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->

	<!-- SIDEBAR -->
	<div class="sidebar">
    {dynamicSidebar "post-widgets-area"}
	</div><!-- end of sidebar -->

</div><!-- end of container -->
{/block}

{? isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'lv'}
{define $localViewer}
	{include snippet-custom-room-viewer.php, options => $post->options('page_room'), rooms => $site->create('room', $post->options('page_room')->roomViewerCat)}
{/define}

{? isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'someRandomNotImportantStringHome2'}
{define $localService}
	{include snippet-custom-services-boxes.php, boxes => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)}
{/define}
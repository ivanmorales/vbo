{extends 'main-layout.php'}

{var $sectionsOrder = isset($post->options('sectionsOrder')->overrideGlobalOrder) ? $post->options('sectionsOrder')->order : null}

{block content}

<div class="page-content">
<div id="container" class="home defaultContentWidth clear onecolumn">

	{if trim($post->content) != ""}

  	<div id="content" class="mainbar entry-content" style="text-align: center; margin: 0 auto; padding-bottom: 10px;">
  		{!$post->content}
  	</div>
	{/if}

</div>
</div>

<div class="separator-line-new"></div>
{/block}

{? isset($post->options('page_room')->overrideGlobalViewer) ? $localViewer = 'room' : $localViewer = 'xv'}
{define $localViewer}
	{include snippet-custom-room-viewer-homepage.php, options => $post->options('page_room'), rooms => $site->create('room', $post->options('page_room')->roomViewerCat)}
{/define}

{? isset($post->options('page_service_boxes')->overrideGlobalServiceBox) ? $localService = 'service-boxes' : $localService = 'xsb'}
{define $localService}
	{include snippet-custom-services-boxes.php, options => $post->options('page_service_boxes'), boxes => $site->create('service-box',$post->options('page_service_boxes')->serviceBoxCategory)}
{/define}


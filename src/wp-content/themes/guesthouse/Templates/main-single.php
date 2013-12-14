{extends 'main-layout.php'}

{block content}

<!-- SUBPAGE -->
<div id="container" class="subpage defaultContentWidth subpage-line clear">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content">
		{if $post->thumbnailSrc != false }
    <div id="content-wrapper">
    {else}
    <div id="content-wrapper" class="no-thumbnail">
    {/if}
			<h1>{$post->title}</h1>

      {if $post->thumbnailSrc != false }
      <div class="postitem clear">
      {else}
      <div class="postitem">
      {/if}

			{if !$post->options('post_featured_images')->hideFeatured}
			{if $post->thumbnailSrc != false }
			<a href="{$post->thumbnailSrc}">
			<div class="entry-thumbnail">
				<img src="{$timthumbUrl}?src={$post->thumbnailSrc}&w=433&h=198" alt="" />
			</div>
			</a>
			{/if}
			{/if}

      <div class="info-box">
	  {editPostLink $post->id}
          <a href="#" rel="prettySociable"><img class="share" src="{$themeUrl}/design/img/share.png" /></a>
          <div class="info-box-inside">
            <h3>{$post->date|date:"j M"}</h3>
            <small>posted by <a class="url fn n" href="{$post->author->postsUrl}" title="View all posts by {$post->author->name}" rel="author">{$post->author->name}</a></small>
            <br><br>
            {if $post->type == 'post'}
					    {if $post->categories}
            <span><b>Categories: </b>{!$post->categories}</span>
            <br><br>
              {/if}
              {if $post->tags}
            <span><b>Tags: </b>{!$post->tags}</span>
            <br><br>
              {/if}
            {/if}
          </div>
        </div>
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
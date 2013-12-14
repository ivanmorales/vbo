{extends 'main-layout.php'}
{block content}

<!-- SUBPAGE -->
<div id="container" class="clear onecolumn">
	<!-- MAINBAR -->
	<div id="content" class="mainbar entry-content defaultContentWidth">
		<div id="content-wrapper">
			<h1>Our Rooms</h1>
            <div class="mainbar">
            <p style="width:700px;">
            <img src="http://www.villabuenaonda.com/wp-content/uploads/Nispero-Ocean-View-Suite-interior.jpg" alt="Ocean View Suite Interior" /><br /><br />
            We have seven spacious suites at our hotel, each one named after a tree species native to the region. There are three on the 1st floor and four on the 2nd floor, each with an en suite bathroom, fine linens, full closets, surround sound, original paintings and 10 ft. ceilings.</p>
<p style="width:700px;">Our rooms enjoy ocean views from a private patio or balcony, and our 2 Bedroom Suite has partial ocean view from the front room. The two corner suites on the 2nd floor have over-sized bathrooms with semi-open-air showers, while the downstairs Poro Poro Suite is handicap accessible.</p>
		</div>
			{if $posts}
		<div class="sidebar">
				{include general-content-nav.php location => 'nav-above'}

				{include snippet-rooms-loop.php posts => $posts}

				{include general-content-nav.php location => 'nav-below'}
		</div>
			{else}

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h2 class="entry-title">Nothing Found</h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
						{include 'general-search-form.php'}
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			{/if}

		</div><!-- end of content-wrapper -->
	</div><!-- end of mainbar -->
</div><!-- end of container -->

<?php
/**
 * Template Name: Templates &raquo; Content navigation
 * Description: A Page Template only for homepage
 */
?>
{willPaginate}
	<nav id="{$location}">
		<div class="nav-previous">{prevPostsLink '<span class="meta-nav">&larr;</span> Older posts'}</div>
		<div class="nav-next">{nextPostsLink 'Newer posts <span class="meta-nav">&rarr;</span>'}</div>
	</nav>
{/willPaginate}
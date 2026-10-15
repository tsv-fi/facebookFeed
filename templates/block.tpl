{**
 * plugins/generic/facebookFeed/block.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Facebook Feed plugin block.
 *
 *}

<div class="pkp_block block_facebookFeed">
	<div class="content">
		<iframe
			src="https://www.facebook.com/plugins/page.php?href={$facebookFeedUrl|escape:"url"}&amp;tabs=timeline&amp;width=500&amp;height=500&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=false&amp;locale=fi_FI"
			title="Facebook"
			style="border:none;overflow:hidden;width:100%;height:500px;"
			scrolling="no"
			frameborder="0"
			allowfullscreen="true"
			loading="lazy"
			allow="clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
		<p class="facebookFeedLink"><a href="{$facebookFeedUrl|escape}">{$facebookFeedUrl|escape}</a></p>
	</div>
</div>


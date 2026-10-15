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
		<div id="fb-root"></div>
		{literal}
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/fi_FI/sdk.js#xfbml=1&version=v26.0';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		{/literal}
		{* Header only: Meta does not show the timeline to most European Region visitors *}
		<div class="fb-page" data-href="{$facebookFeedUrl|escape}" data-tabs="" data-height="130" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="{$facebookFeedUrl|escape}" class="fb-xfbml-parse-ignore"></blockquote></div>
	</div>
</div>


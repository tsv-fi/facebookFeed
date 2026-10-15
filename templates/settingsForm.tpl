{**
 * plugins/generic/facebookFeed/templates/settingsForm.tpl
 *
 * Copyright (c) 2014-2026 Simon Fraser University
 * Copyright (c) 2003-2026 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Facebook Feed plugin settings
 *
 *}
<script>
	$(function() {ldelim}
		// Attach the form handler.
		$('#fbSettingsForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	{rdelim});
</script>

<form class="pkp_form" id="fbSettingsForm" method="post" action="{url router=\PKP\core\PKPApplication::ROUTE_COMPONENT op="manage" category="generic" plugin=$pluginName verb="settings" save=true}">
	{csrf}
	{include file="controllers/notification/inPlaceNotification.tpl" notificationId="fbSettingsFormNotification"}

	<div id="description">{translate key="plugins.generic.facebookFeed.manager.settings.description"}</div>

	{fbvFormArea id="fbSettingsFormArea"}
		{fbvElement type="text" id="facebookFeedUrl" name="facebookFeedUrl" value=$facebookFeedUrl label="plugins.generic.facebookFeed.manager.settings.facebookFeedUrl"}
	{/fbvFormArea}

	{fbvFormButtons}

	<p><span class="formRequired">{translate key="common.requiredField"}</span></p>
</form>

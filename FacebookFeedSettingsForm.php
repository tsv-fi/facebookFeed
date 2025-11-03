<?php

/**
 * @file plugins/generic/facebookFeed/FacebookFeedSettingsForm.inc.php
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class FacebookFeedSettingsForm
 * @ingroup plugins_generic_facebookFeed
 *
 * @brief Form for journal managers to modify Facebook Feed plugin settings
 */

namespace APP\plugins\generic\facebookFeed;

use APP\template\TemplateManager;
use PKP\form\Form;


class FacebookFeedSettingsForm extends Form {

	/** @var int */
	var $_contextId;

	/** @var object */
	var $_plugin;

	/**
	 * Constructor
	 * @param $plugin FacebookFeedPlugin
	 * @param $contextId int
	 */
	function __construct($plugin, $contextId) {
		$this->_contextId = $contextId;
		$this->_plugin = $plugin;

		parent::__construct($plugin->getTemplateResource('settingsForm.tpl'));

		$this->addCheck(new \PKP\form\validation\FormValidatorPost($this));
		$this->addCheck(new \PKP\form\validation\FormValidatorCSRF($this));
	}

	/**
	 * Initialize form data.
	 */
	function initData() {
		$this->_data = array(
			'facebookFeedUrl' => $this->_plugin->getSetting($this->_contextId, 'facebookFeedUrl'),
		);
	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(array('facebookFeedUrl'));
	}

	/**
	 * Fetch the form.
	 * @copydoc Form::fetch()
	 */
	function fetch($request, $template = NULL, $display = false) {
		$templateMgr = TemplateManager::getManager($request);
		$templateMgr->assign('pluginName', $this->_plugin->getName());
		return parent::fetch($request, $template, $display);
	}

	/**
	 * Save settings.
	 */
    public function execute(...$functionArgs)
    {
        $this->_plugin->updateSetting($this->_contextId, 'facebookFeedUrl', trim($this->getData('facebookFeedUrl'), "\"\';"), 'string');
        parent::execute(...$functionArgs);
    }
}

if (!PKP_STRICT_MODE) {
    class_alias('\APP\plugins\generic\facebookFeed\FacebookFeedSettingsForm', '\FacebookFeedSettingsForm');
}

?>

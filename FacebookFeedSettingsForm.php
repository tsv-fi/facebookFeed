<?php

/**
 * @file plugins/generic/facebookFeed/FacebookFeedSettingsForm.php
 *
 * Copyright (c) 2014-2026 Simon Fraser University
 * Copyright (c) 2003-2026 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class FacebookFeedSettingsForm
 *
 * @ingroup plugins_generic_facebookFeed
 *
 * @brief Form for journal managers to modify Facebook Feed plugin settings
 */

namespace APP\plugins\generic\facebookFeed;

use APP\template\TemplateManager;
use PKP\form\Form;
use PKP\form\validation\FormValidatorCSRF;
use PKP\form\validation\FormValidatorPost;

class FacebookFeedSettingsForm extends Form
{
    private int $contextId;

    private FacebookFeedPlugin $plugin;

    public function __construct(FacebookFeedPlugin $plugin, int $contextId)
    {
        $this->contextId = $contextId;
        $this->plugin = $plugin;

        parent::__construct($plugin->getTemplateResource('settingsForm.tpl'));

        $this->addCheck(new FormValidatorPost($this));
        $this->addCheck(new FormValidatorCSRF($this));
    }

    /**
     * Initialize form data.
     */
    public function initData()
    {
        $this->_data = [
            'facebookFeedUrl' => $this->plugin->getSetting($this->contextId, 'facebookFeedUrl'),
        ];
    }

    /**
     * Assign form data to user-submitted data.
     */
    public function readInputData()
    {
        $this->readUserVars(['facebookFeedUrl']);
    }

    /**
     * @copydoc Form::fetch()
     *
     * @param null|mixed $template
     */
    public function fetch($request, $template = null, $display = false)
    {
        $templateMgr = TemplateManager::getManager($request);
        $templateMgr->assign('pluginName', $this->plugin->getName());
        return parent::fetch($request, $template, $display);
    }

    /**
     * @copydoc Form::execute()
     */
    public function execute(...$functionArgs)
    {
        $this->plugin->updateSetting($this->contextId, 'facebookFeedUrl', trim((string) $this->getData('facebookFeedUrl'), "\"\';"), 'string');
        parent::execute(...$functionArgs);
    }
}

if (!PKP_STRICT_MODE) {
    class_alias('\APP\plugins\generic\facebookFeed\FacebookFeedSettingsForm', '\FacebookFeedSettingsForm');
}

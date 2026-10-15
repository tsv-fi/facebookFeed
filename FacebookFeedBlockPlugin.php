<?php

/**
 * @file plugins/generic/facebookFeed/FacebookFeedBlockPlugin.php
 *
 * Copyright (c) 2014-2026 Simon Fraser University
 * Copyright (c) 2003-2026 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class FacebookFeedBlockPlugin
 *
 * @ingroup plugins_generic_facebookFeed
 *
 * @brief Class for block component of Facebook Feed plugin
 */

namespace APP\plugins\generic\facebookFeed;

use PKP\plugins\BlockPlugin;

class FacebookFeedBlockPlugin extends BlockPlugin
{
    /** Parent plugin */
    protected FacebookFeedPlugin $parentPlugin;

    public function __construct(FacebookFeedPlugin $parentPlugin)
    {
        parent::__construct();
        $this->parentPlugin = $parentPlugin;
    }

    /**
     * Get the name of this plugin. The name must be unique within
     * its category.
     */
    public function getName()
    {
        return 'FacebookFeedBlockPlugin';
    }

    /**
     * Hide this plugin from the management interface (it's subsidiary)
     */
    public function getHideManagement()
    {
        return true;
    }

    /**
     * @copydoc Plugin::getDisplayName()
     */
    public function getDisplayName()
    {
        return __('plugins.generic.facebookFeed.displayName');
    }

    /**
     * @copydoc Plugin::getDescription()
     */
    public function getDescription()
    {
        return __('plugins.generic.facebookFeed.description');
    }

    /**
     * Override the builtin to get the correct plugin path.
     */
    public function getPluginPath()
    {
        return $this->parentPlugin->getPluginPath();
    }

    /**
     * @copydoc BlockPlugin::getContents()
     *
     * @param null|mixed $request
     */
    public function getContents($templateMgr, $request = null)
    {
        $context = $request?->getContext();
        if (!$context) {
            return '';
        }

        $facebookFeedUrl = $this->parentPlugin->getSetting($context->getId(), 'facebookFeedUrl');
        if (!$facebookFeedUrl) {
            return '';
        }

        $templateMgr->assign('facebookFeedUrl', $facebookFeedUrl);
        return parent::getContents($templateMgr, $request);
    }
}

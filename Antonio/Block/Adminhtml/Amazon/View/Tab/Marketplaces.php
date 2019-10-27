<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon\View\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\View\Element\Text\ListText;

/**
 * Class Integrations
 * @api
 */
class Marketplaces extends ListText implements TabInterface
{
    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Amazon Stores');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Amazon Stores');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}

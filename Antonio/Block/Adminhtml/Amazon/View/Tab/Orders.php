<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon\View\Tab;

use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Framework\View\Element\Text\ListText;

/**
 * Class Orders
 * @api
 */
class Orders extends ListText implements TabInterface
{
    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        if ($this->getRequest()->getParam('status')) {
            return ('Unshipped Orders');
        }

        return __('Orders');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        if ($this->getRequest()->getParam('status')) {
            return ('Unshipped Orders');
        }

        return __('Orders');
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

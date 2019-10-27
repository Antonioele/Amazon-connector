<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon\View;

use Magento\Backend\Block\Widget\Tabs;

/**
 * Class Menu
 * @api
 */
class Menu extends Tabs
{
    /** @var string */
    protected $_template = 'Magento_Backend::widget/tabshoriz.phtml';

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('amazon_view_menu_tab');
        $this->setDestElementId('amazon_view_menu_tab_content');
    }
}

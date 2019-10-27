<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon;

use Magento\Backend\Block\Template;

/**
 * Class View
 * @api
 */
class View extends Template
{
    /** @var string */
    protected $_template = 'amazon/view.phtml';

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param array $data
     */
    public function __construct(\Magento\Backend\Block\Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @return void
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
    }

    /**
     * @return string
     */
    public function getSwitchUrl()
    {
        if ($url = $this->getData('switch_url')) {
            return $url;
        }
        return $this->getUrl('adminhtml/*/*', ['_current' => true, 'period' => null]);
    }
}

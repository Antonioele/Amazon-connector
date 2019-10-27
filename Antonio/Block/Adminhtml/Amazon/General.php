<?php
declare(strict_types=1);

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon;


use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class General
 * @api
 */
class General extends Template
{
    /** @var AccountRepositoryInterface $accountRepository */


    /**
     * @param Context $context
     * @param AccountRepositoryInterface $accountRepository
     * @param ConfigManagementInterface $configManagement
     * @param array $data
     */
    public function __construct(
        Context $context,

        array $data = []
    )
    {
        parent::__construct($context, $data);

    }

}
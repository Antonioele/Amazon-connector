<?php
declare(strict_types=1);

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Block\Adminhtml\Amazon;

use Aiello1\Antonio\Api\AccountRepositoryInterface;
use Aiello1\Antonio\Model\Amazon\Definitions;
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

protected  $accountRepossitory;
    /**
     * @param Context $context
     * @param AccountRepositoryInterface $accountRepository
     * @param ConfigManagementInterface $configManagement
     * @param array $data
     */
    public function __construct(
        Context $context,
        AccountRepositoryInterface $accountRepository,
        array $data = []
    )
    {
        parent::__construct($context, $data);

    }
    /**
     * Get Amazon account
     *
     * @return AccountInterface
     */
    public function getAccount()
    {
        /** @var int */
        $merchantId = $this->getMerchantId();

        /** @var AccountInterface */
        return $this->accountRepository->getByMerchantId($merchantId, true);
    }
    public function getUserGuideUrl()
    {
        /** @var string */
        $url = Definitions::UG_URL;
        return $this->escapeHtml($url);
    }

    /**
     * Returns user guide url
     *
     * @return string
     */
    public function getMainMenuUrl()
    {
        /** @var string */
        $url = Definitions::MAIN_MENU_URL;
        return $this->escapeHtml($url);
    }

}
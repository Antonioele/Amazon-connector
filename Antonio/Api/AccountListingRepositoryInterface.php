<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Api;

use Aiello1\Antonio\Api\Data\AccountListingInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface AccountListingRepositoryInterface
 * @api
 */
interface AccountListingRepositoryInterface
{
    /**
     * Create and/or update account settings
     *
     * @param AccountListingInterface $account
     * @return AccountListingInterface
     * @throws CouldNotSaveException
     */
    public function save(AccountListingInterface $account);

    /**
     * Get account object by account id
     *
     * @param int $merchantId
     * @return AccountListingInterface
     */
    public function getByMerchantId($merchantId);
}

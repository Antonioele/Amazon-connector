<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Api;

use Aiello1\Antonio\Api\Data\AccountOrderInterface;
use Magento\Framework\Exception\CouldNotSaveException;

/**
 * Interface AccountOrderRepositoryInterface
 * @api
 */
interface AccountOrderRepositoryInterface
{
    /**
     * Create and/or update account settings
     *
     * @param AccountOrderInterface $account
     * @return AccountOrderInterface
     * @throws CouldNotSaveException
     */
    public function save(AccountOrderInterface $account);

    /**
     * Get account object by account id
     *
     * @param int $merchantId
     * @return AccountOrderInterface
     */
    public function getByMerchantId($merchantId);
}

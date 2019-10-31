<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Api;

use Aiello1\Antonio\Api\Data\AccountInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface AccountRepositoryInterface
 * @api
 */
interface AccountRepositoryInterface
{
    /**
     * Create and/or update account settings
     *
     * @param AccountInterface $account
     * @return AccountInterface
     * @throws CouldNotSaveException
     */
    public function save(AccountInterface $account);

    /**
     * Delete account
     *
     * @param AccountInterface $account
     * @return void
     */
    public function delete(AccountInterface $account);

    /**
     * Get account object by account id
     *
     * @param int $merchantId
     * @param boolean $empty
     * @return AccountInterface
     * @throws NoSuchEntityException
     */
    public function getByMerchantId($merchantId, $empty = false);

    /**
     * Checks for an existing account
     *
     * @return bool
     */
    public function isAccount();
}

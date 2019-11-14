<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Model\Amazon;

use Aiello1\Antonio\Api\AccountRepositoryInterface;
use Aiello1\Antonio\Api\Data\AccountInterface;
use Aiello1\Antonio\Model\ResourceModel\Amazon\Account;
use Aiello1\Antonio\Model\ResourceModel\Amazon\Account\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;

/**
 * Class AccountRepository
 */
class AccountRepository implements AccountRepositoryInterface
{
    /** @var AccountFactory $accountFactory */
    protected $accountFactory;
    /** @var Account $resourceModel */
    protected $resourceModel;
    /** @var CollectionFactory $collectionFactory */
    protected $collectionFactory;

    /**
     * @param AccountFactory $accountFactory
     * @param Account $resourceModel
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        AccountFactory $accountFactory,
        Account $resourceModel,
        CollectionFactory $collectionFactory
    ) {
        $this->accountFactory = $accountFactory;
        $this->resourceModel = $resourceModel;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function save(AccountInterface $account)
    {
        try {
            $this->resourceModel->save($account);
        } catch (\Exception $e) {
            /** @var LoggerInterface $logger */
            $logger = ObjectManager::getInstance()->get(LoggerInterface::class);
            $logger->critical($e);
            $phrase = __('Unable to save account settings. Please try again.');
            throw new CouldNotSaveException($phrase, $e);
        }

        return $account;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(AccountInterface $account)
    {
        try {
            $this->resourceModel->delete($account);
        } catch (\Exception $e) {
            // already deleted
            return;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getByMerchantId($merchantId, $empty = false)
    {
        /** @var AccountFactory $account */
        $account = $this->accountFactory->create();

        $account->load($merchantId);

        if (!$account->getMerchantId()) {
            // if return empty is not set
            if (!$empty) {
                $phrase = __('The requested account does not exist.');
                throw new NoSuchEntityException($phrase);
            }
        }

        return $account;
    }

    /**
     * {@inheritdoc}
     */
    public function isAccount()
    {
        return $this->collectionFactory
            ->create()
            ->getFirstItem()
            ->getMerchantId();
    }
}

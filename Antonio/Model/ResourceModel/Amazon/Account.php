<?php
declare(strict_types=1);

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Model\ResourceModel\Amazon;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Account
 */
class Account extends AbstractDb
{
    /**
     * Constructor
     */
    protected function _construct()
    {
        $this->_init(
            'channel_amazon_account',
            'merchant_id'
        );
    }
}

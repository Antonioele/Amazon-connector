<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Model\ResourceModel\Amazon\Account;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Aiello1\Antonio\Model\Amazon\Account::class,
            \Aiello1\Antonio\Model\ResourceModel\Amazon\Account::class
        );
    }
}

<?php

declare(strict_types=1);
namespace Aiello1\Antonio\Model\ResourceModel\Amazon;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;


class Account extends  AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            'channel_amazon_account',
            'merchant_id'
        );
    }

}
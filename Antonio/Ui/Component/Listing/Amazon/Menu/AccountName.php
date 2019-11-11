<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Ui\Component\Listing\Amazon\Menu;

use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class AccountName
 */
class AccountName extends Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                /** @var int */
                $merchantId = $item['merchant_id'];
                /** @var string */
                $name = $item['name'];

                /** @var string */
                $url = $this->getContext()->getUrl("channel/amazon/account_index", ["merchant_id" => $merchantId]);
                $item['name'] = "<a class='action-menu-item' href='$url'>$name</a>";
            }
        }
        return $dataSource;
    }
}

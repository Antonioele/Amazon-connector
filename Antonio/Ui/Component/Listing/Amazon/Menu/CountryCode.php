<?php

/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Aiello1\Antonio\Ui\Component\Listing\Amazon\Menu;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class CountryCode
 */
class CountryCode implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'US', 'label' => __('United States')],
            ['value' => 'CA', 'label' => __('Canada')],
            ['value' => 'MX', 'label' => __('Mexico')],
            ['value' => 'GB', 'label' => __('United Kingdom')]
        ];
    }
}

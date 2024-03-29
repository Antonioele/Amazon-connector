<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Aiello1\Antonio\Ui\Component\Listing\Amazon\Menu;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class IsActive implements OptionSourceInterface
{
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '0', 'label' => __('Inactive')],
            ['value' => '1', 'label' => __('Active')],
            ['value' => '2', 'label' => __('In Setup')]
        ];
    }
}

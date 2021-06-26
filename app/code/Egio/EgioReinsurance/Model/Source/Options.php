<?php

namespace Egio\EgioReinsurance\Model\Source;

/**
 * Class options
 * @package Egio\EgioReinsurance\Model\Source
 */
class Options  implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('No')],
            ['value' => 1, 'label' => __('Yes')]
        ];
    }
}

<?php

namespace Egio\EgioReinsurance\Model\ResourceModel\Reviews;
/**
 * Class Collection
 * @package Egio\EgioReinsurance\Model\ResourceModel\Reviews
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    //  * @var string
    //  */
    // protected $_idFieldName = 'reassurance_id';
    // /**
    //  * @var string
    //  */
    // protected $_eventPrefix = 'md_reinsurance_collection';
    // /**
    //  * @var string
    //  */
    // protected $_eventObject = 'reviews_collection';

    // /**
    //  * Define resource model
    //  * @return void
    //  */

      /**
     * Define model & resource model
     */
     /// pass model and resources model class names to the _init method.
    protected function _construct()
    {
        $this->_init('Egio\EgioReinsurance\Model\Reviews', 'Egio\EgioReinsurance\Model\ResourceModel\Reviews');

    }
}

<?php

namespace Egio\EgioReinsurance\Model;
/**
 * Class Reviews
 * @package Egio\EgioReinsurance\Model
 */
class Reviews extends \Magento\Framework\Model\AbstractModel 
// implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'md_reinsurance';
    /**
    //  * @var string
    //  */
    // protected $_cacheTag = 'md_reinsurance';
    // /**
    //  * @var string
    //  */
    // protected $_eventPrefix = 'md_reinsurance';

    /**
     *
    /**
     * Define resource model
    
     */
    protected function _construct()
    {
        $this->_init('Egio\EgioReinsurance\Model\ResourceModel\Reviews');
    }

    // // /**
    //  * @return string[]
    //  */
    // public function getIdentities()
    // {
    //     return [self::CACHE_TAG . '_' . $this->getId()];

    // }


 
    // /**
    //  * @return array
    //  */
    // public function getDefaultValues()
    // {
    //     $values = [];
    //     return $values;
    // }
}

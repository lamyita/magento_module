<?php
namespace Egio\EgioReinsurance\Model\ResourceModel;


/**
 * Class Reviews
 * @package Egio\EgioReinsurance\Model\ResourceModel
 */
class Reviews extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * /**
     * Define main table (initialize table name and primary key).


     */
    
    protected function _construct() {
        $this->_init('md_reinsurance', 'reassurance_id'); //////here "md_reinsurance" is table name and "reassurance_id" is the primary key of custom table

   }

   
}

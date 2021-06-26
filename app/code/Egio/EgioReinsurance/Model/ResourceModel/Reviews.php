<?php
namespace Egio\EgioReinsurance\Model\ResourceModel;


/**
 * Class Reviews
 * @package Egio\EgioReinsurance\Model\ResourceModel
 */
class Reviews extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *
     */
    protected function _construct() {
        $this->_init('md_reinsurance', 'reassurance_id');
    }
}

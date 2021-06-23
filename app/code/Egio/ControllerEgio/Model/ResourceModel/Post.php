<?php
 namespace Egio\ControllerEgio\Model\ResourceModel;

 use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

 class Post extends AbstractDb
 {

    const MAIN_TABLE = 'reassurance';
    const ID_FIELD_NAME = 'reassurance_id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
 }


// class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
// {
	
// 	public function __construct(
// 		\Magento\Framework\Model\ResourceModel\Db\Context $context
// 	)
// 	{
// 		parent::__construct($context);
// 	}
	
// 	protected function _construct()
// 	{
// 		$this->_init('reassurance_post', 'id');
// 	}
	
// }
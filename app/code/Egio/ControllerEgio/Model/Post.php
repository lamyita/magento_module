<?php
 namespace   Egio\ControllerEgio\Model;

 use Magento\Framework\Model\AbstractModel;

 class Post extends AbstractModel
 {
        protected function _construct()
        {
            $this->_init(ResourceModel\Post::class);
        }
    }
    
  
// class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
// {
//     const CACHE_TAG = 'reassurance';
//         protected function _construct()
//         {
//                 $this->_init('Egio\ControllerEgio\Model\ResourceModel\Post');
//         }
 
//         public function getIdentities()
//         {
//         	return [self::CACHE_TAG . '_' . $this->getId()];
// }
 
//         public function getDefaultValues()
//         {
//                 $values = [];
 
//                 return $values;
//         }
// }


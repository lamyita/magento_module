<?php
 namespace Egio\ControllerEgio\Model\ResourceModel\Post;

 use  Egio\ControllerEgio\Model\ResourceModel\Post;
 use  Egio\ControllerEgio\Model\ResourceModel\Post as PostResourceModel;
 use  Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

 class Collection extends AbstractCollection
{
        /**
         * Define resource model
         *
        //  * @return void
        //  */
        // protected function _construct()
        // {
        //         $this->_init('Egio\ControllerEgio\Model\Post', 'Egio\ControllerEgio\Model\ResourceModel\Post');
        // }

        
    protected function _construct()
    {
        $this->_init(Post::class, PostResourceModel::class);
    }
}



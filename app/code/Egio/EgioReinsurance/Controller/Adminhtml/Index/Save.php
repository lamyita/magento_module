<?php

namespace Egio\EgioReinsurance\Controller\Adminhtml\Index;
/**
 * Class Save
 * @package Egio\EgioReinsurance\Controller\Adminhtml\Index
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Egio\EgioReinsurance\Model\ReviewsFactory
     */
    protected $_reviewsFactory;

    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Egio\EgioReinsurance\Model\ReviewsFactory $reviewsFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Egio\EgioReinsurance\Model\ReviewsFactory $reviewsFactory
    )
    {
        $this->_reviewsFactory = $reviewsFactory;
        parent::__construct($context);
    }
   
  

    private function _processbanner_icone($data){

        try{


            $media_dir_obj = $this->_objectManager->get('Magento\Framework\Filesystem')
                                                    ->getDirectoryRead(DirectoryList::MEDIA);                                                                        
            $media_dir = $media_dir_obj->getAbsolutePath();


            if(!empty($_FILES['icone']['name'])){

                $Uploader = $this->_objectManager->create(
                                               'Magento\MediaStorage\Model\File\Uploader',
                                                ['reassurance_id' => 'icone']);

                $Uploader->setAllowCreateFolders(true);
                $Uploader->setAllowRenameFiles(true);

                $banner_dir = $media_dir.'icone';                                
                $result = $Uploader->save($banner_dir);

                unset($result['tmp_name']);
                unset($result['path']);

                $data['icone'] = $Uploader->getUploadedFileName();
                }
            // }else{

            //     if(isset($data['icone']['delete'])){

            //         $data['icone'] = '';

            //     }
            //     // else{

            //     //     if($model->getId()) {

            //     //         if($model->geticone() != ''){                                        
            //     //             $data['icone'] = $model->geticone();
            //     //         }

            //     //     }else{
            //     //         $data['icone'] = '';
            //     //     }
            //     // }
            // }

            if(isset($data['icone']))
                return $data['icone'];    


        } catch (\Exception $e) {

                $this->messageManager->addError(
                        __($e->getMessage())
                );                                
        }      

    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {

        $data = $this->getRequest()->getPostValue();
        // echo dirname(__FILE__,4);
        // die;

        $iconeExt = strtolower(pathinfo($_FILES['icone']['name'], PATHINFO_EXTENSION));
        $filename = bin2hex(random_bytes(32)).'.'.$iconeExt;

        $mad = dirname(__FILE__,4) .'/images/'. $filename;

        $iconeArray = ['icone' => $mad];
       $result = array_merge( $iconeArray, $data );
        
       $allowedExt = ['png', 'svg', 'jpeg'];
    //    var_dump( in_array($iconeExt, $allowedExt));
    //    die;

        $reviewId = isset($data['reassurance_id']) ? $data['reassurance_id'] : '';
        if (!$result or !in_array($iconeExt, $allowedExt)) {
            $this->messageManager->addError(__('svg, png, jpg images allowed .'));
            // $this->_redirect('md_cr/index/index');
            header('location:/md_cr/index/index');

        }
        try {
            $rowData = $this->_reviewsFactory->create()->load($reviewId);
            if (!$rowData->getId() && $reviewId) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('md_cr/index/index');
            }
            $rowData->setData($result);
            
        //     echo basename(__FILE__);
        //    die;
        move_uploaded_file( $_FILES['icone']['tmp_name'], $mad);
            
        
            $rowData->save();

            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('md_cr/index/index');
        

    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Egio_EgioReinsurance::home');
 
    }






















   

}
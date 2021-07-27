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
    protected $imageUploader;
    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Egio\EgioReinsurance\Model\ReviewsFactory $reviewsFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Egio\EgioReinsurance\Model\ReviewsFactory $reviewsFactory,
         \Egio\EgioReinsurance\Model\ImageUploader $imageUploader


    )
    {
        $this->_reviewsFactory = $reviewsFactory;
        parent::__construct($context);
        $this->imageUploader = $imageUploader;

    }
   
  


    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $data = $data['reviews'];
        
        // var_dump($data);
        // die;
        if (isset($data['icone'][0]['name']) && isset($data['icone'][0]['tmp_name'])) {
            $data['icone'] = $data['icone'][0]['name'];
            $this->imageUploader->moveFileFromTmp($data['icone']);
        } elseif (isset($data['icone'][0]['name']) && !isset($data['icone'][0]['tmp_name'])) {
            $data['icone'] = $data['icone'][0]['name'];
        } else {
            $data['icone'] = '';
        }
    
        $reviewId = isset($data['reassurance_id']) ? $data['reassurance_id'] : '';
        if (!$data) {
            $this->_redirect('md_cr/index/index');
        }
      
        try {
            $rowData = $this->_reviewsFactory->create()->load($reviewId);
            if (!$rowData->getId() && $reviewId) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('md_cr/index/index');
            }
            
            
            $rowData->setData($data);
            //  var_dump($data);
            //  die;
            // print_r($data);
            // exit;
           
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        

            
        
        }
        
         catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }

        // if (isset($data['image'][0]['icone']) && isset($data['image'][0]['tmp_icone'])) {
        //     $data['image'] = $data['image'][0]['icone'];
        //     $this->imageUploader->moveFileFromTmp($data['image']);
        // } elseif (isset($data['image'][0]['icone']) && !isset($data['image'][0]['tmp_icone'])) {
        //     $data['image'] = $data['image'][0]['icone'];
        // } else {
        //     $data['image'] = '';
        // }

        $this->_redirect('md_cr/index/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Egio_EgioReinsurance::home');
    }

    // private function _processbanner_icone($data){

    //     try{


    //         $media_dir_obj = $this->_objectManager->get('Magento\Framework\Filesystem')
    //                                                 ->getDirectoryRead(DirectoryList::MEDIA);                                                                        
    //         $media_dir = $media_dir_obj->getAbsolutePath();


    //         if(!empty($_FILES['icone']['name'])){

    //             $Uploader = $this->_objectManager->create(
    //                                            'Magento\MediaStorage\Model\File\Uploader',
    //                                             ['reassurance_id' => 'icone']);

    //             $Uploader->setAllowCreateFolders(true);
    //             $Uploader->setAllowRenameFiles(true);

    //             $banner_dir = $media_dir.'icone';                                
    //             $result = $Uploader->save($banner_dir);

    //             unset($result['tmp_name']);
    //             unset($result['path']);

    //             $data['icone'] = $Uploader->getUploadedFileName();
    //             }
    //         // }else{

    //         //     if(isset($data['icone']['delete'])){

    //         //         $data['icone'] = '';

    //         //     }
    //         //     // else{

    //         //     //     if($model->getId()) {

    //         //     //         if($model->geticone() != ''){                                        
    //         //     //             $data['icone'] = $model->geticone();
    //         //     //         }

    //         //     //     }else{
    //         //     //         $data['icone'] = '';
    //         //     //     }
    //         //     // }
    //         // }

    //         if(isset($data['icone']))
    //             return $data['icone'];    


    //     } catch (\Exception $e) {

    //             $this->messageManager->addError(
    //                     __($e->getMessage())
    //             );                                
    //     }      

    // }


    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    // public function execute()
    // {

    //     $data = $this->getRequest()->getPostValue();
    //     // echo dirname(__FILE__,4);
    //     // die;

    //     $iconeExt = strtolower(pathinfo($_FILES['icone']['name'], PATHINFO_EXTENSION));
    //     $filename = bin2hex(random_bytes(32)).'.'.$iconeExt;

    //     $path = dirname(__FILE__,4) .'/images/'. $filename;
    //     // $path = $_FILES['icone']['tmp_name'] ;


    //     $imageKit = new ImageKit(
    //       "public_q8QK4O+MDV4Z2us0+56IGdE0zQ0=",
    //       "private_DW02Jr2vFzEX/MXe3jsDRn2VogU=",
    //       "https://ik.imagekit.io/ywpjd3wpcqq"
    //     );
    //     // var_dump($imageKit);
    //     // die;


    //     $imageURL = $imageKit->url(array(
    //         "path" => $_FILES['icone']['tmp_name']
    //     ));
    //        move_uploaded_file( $_FILES['icone']['tmp_name'], $path);

    //     $imageURL = $imageKit->uploadFiles(array(
    //         "file" => $path, // required
    //         "fileName" => $filename // required
    //     ));

    //     // $imageURL = $imageKit->url(array(
    //     //     "path" => $_FILES['icone']['tmp_name'],
    //     //     "transformation" => array(
    //     //         array(
    //     //             "height" => "300",
    //     //             "width" => "400",
    //     //         )
    //     //     )
    //     // ));
    //     // $array = get_object_vars($imageURL);

    //     // var_dump( $array['url'] );
    //     // var_dump($imageURL);
    //     // die;

    //     $iconeArray = ['icone' => $imageURL->success->url];
    //    $result = array_merge( $iconeArray, $data );
        
    //    $allowedExt = ['png', 'svg', 'jpeg'];
    // //    var_dump( in_array($iconeExt, $allowedExt));
    // //    die;

    //     $reviewId = isset($data['reassurance_id']) ? $data['reassurance_id'] : '';
    //     if (!$result or !in_array($iconeExt, $allowedExt)) {
    //         $this->messageManager->addError(__('svg, png, jpg images allowed .'));
    //         // $this->_redirect('md_cr/index/index');
    //         header('location:/md_cr/index/index');

    //     }
    //     try {
    //         $rowData = $this->_reviewsFactory->create()->load($reviewId);
    //         if (!$rowData->getId() && $reviewId) {
    //             $this->messageManager->addError(__('row data no longer exist.'));
    //             $this->_redirect('md_cr/index/index');
    //         }
    //         $rowData->setData($result);
            

          
        
    //     //    move_uploaded_file( $_FILES['icone']['tmp_name'], $path);
            
        
    //         $rowData->save();

    //         $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
    //     } catch (\Exception $e) {
    //         $this->messageManager->addError(__($e->getMessage()));
    //     }
    //     $this->_redirect('md_cr/index/index');
        

    // }

    // /**
    //  * @return bool
    //  */
    // protected function _isAllowed()
    // {
    //     return $this->_authorization->isAllowed('Egio_EgioReinsurance::home');
 
    // }






















   

}
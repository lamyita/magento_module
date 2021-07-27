<?php

//  namespace Egio\EgioReinsurance\Block\Adminhtml\Reviews\Edit;
// /**
//  * Class Form
//  * @package Egio\EgioReinsurance\Block\Adminhtml\Reviews\Edit
//  */
// class Form extends \Magento\Backend\Block\Widget\Form\Generic
// {

//     /**
//      * @var
//      */
//     protected $_systemStore;

//     /**
//      * @var \Egio\EgioReinsurance\Model\Source\options
//      */
//     protected $_options;

//     /**
//      * Form constructor.
//      * @param \Magento\Backend\Block\Template\Context $context
//      * @param \Magento\Framework\Registry $registry
//      * @param \Magento\Framework\Data\FormFactory $formFactory
//      * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
//      * @param \Egio\EgioReinsurance\Model\Source\options $options
//      * @param array $data
//      */
//     public function __construct(
//         \Magento\Backend\Block\Template\Context $context,
//         \Magento\Framework\Registry $registry,
//         \Magento\Framework\Data\FormFactory $formFactory,
//         \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
//         \Egio\EgioReinsurance\Model\Source\options $options,
//         array $data = []
//     )
//     {
//         $this->_wysiwygConfig = $wysiwygConfig;
//         $this->_options = $options;
//         parent::__construct($context, $registry, $formFactory, $data);
//     }

//     /**
//      * @return Form
//      * @throws \Magento\Framework\Exception\LocalizedException
//      */
//     protected function _prepareForm()
//     {
//         $model = $this->_coreRegistry->registry('row_data');
//         $form = $this->_formFactory->create(['data' => ['id' => 'edit_form', 'enctype' => 'multipart/form-data', 'action' => $this->getData('action'), 'method' => 'post']]);
//         $form->setHtmlIdPrefix('md_cr_');
//         if ($model) {
//             $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('reinsurance Details'), 'class' => 'fieldset-wide']);
//             $fieldset->addField('reassurance_id', 'hidden', ['name' => 'reassurance_id']);
//         } else {
//             $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('reinsurance Details'), 'class' => 'fieldset-wide']);
//         }
//         $fieldset->addField(
//             'libelle',
//             'text',
//             [
//                 'name' => 'libelle',
//                 'label' => __('libelle'),
//                 'title' => __('Customer Libelle'),
//                 'class' => 'required-entry',
//                 'required' => true,
//             ]
//         );
//         $fieldset->addField(
//             'description',
//             'text',
//             [
//                 'name' => 'description',
//                 'label' => __('description'),
//                 'title' => __('description'),
//                 'class' => 'required-entry',
//                 'required' => true,
//             ]
//         );

    

//         $fieldset->addField(
//             'alt',
//             'text',
//             [
//                 'name' => 'alt',
//                 'label' => __('alt'),
//                 'title' => __('alt'),
//                 'required' => false,
//             ]
//         );
//         $fieldset->addField(
//             'statut',
//             'text',
//             [
//                 'name' => 'statut',
//                 'label' => __('statut'),
//                 'title' => __('statut'),
//                 'class' => 'required-entry',
//                 'required' => true,
//             ]
//         );

     

//         $fieldset->addField(
//             'ordre',
//             'select',
//             [
//                 'name' => 'ordre',
//                 'label' => __('ordre'),
//                 'id' => 'options',
//                 'title' => __('Ordre'),
//                 'values' => $this->_options->toOptionArray(),
//             ]
//         );
 
//         $fieldset->addField(
//             'lien',
//             'text',
//             [
//                 'name' => 'lien',
//                 'label' => __('lien'),
//                 'title' => __('lien'),
//                 'required' => false,
//             ]
//         );

//         $fieldset->addField(
//             'title_du_lien',
//             'text',
//             [
//                 'name' => 'title_du_lien',
//                 'label' => __('title_du_lien'),
//                 'title' => __('title_du_lien'),
//                 'class' => 'required-entry',
//                 'required' => false,
//             ]
//         );

      

//         $fieldset->addField(
//             'nouvelle_fenêtre',
//             'select',
//             [
//                 'name' => 'nouvelle_fenêtre',
//                 'label' => __('nouvelle_fenêtre'),
//                 'id' => 'options',
//                 'title' => __('options'),
//                 // 'class' => 'required-entry options',
//                 'values' => $this->_options->toOptionArray(),
//                 // 'required' => true,
//             ]
//         );
 

//         $fieldset->addField(
//             'created',
//             'date',
//             [
//               'label' => __('created'),
//                 'date_format' => 'yyyy-MM-dd',
//                 'time_format' => 'hh:mm:ss',
//                 'title' => __('created'),
//                 'class' => 'required-entry',
//                 'required' => true,
//             ]

//         );


//         $fieldset->addField(
//             'modified',
//             'date',
//             [
//                 'name' => 'modified',
//                 'date_format' => 'yyyy-MM-dd',
//                 'time_format' => 'hh:mm:ss',
//                 'label' => __('modified'),
//                 'title' => __('modified'),
//                 'class' => 'required-entry',
//                 'required' => true,
//             ]
//         );
       
//         $fieldset->addField(
//             'icone',
//             'image',
//             [
//                 'name' => 'icone',
//                 'label' => __('icone'),
//                 'title' => __('icone'),
//                 'required'  => false,
//                 // 'note' => 'Allow image type: jpg, svg, png',
//             ]
//         );
        

//         $form->setValues($model ? $model->getData() : '');
//         $form->setUseContainer(true);
//         $this->setForm($form);
//         return parent::_prepareForm();
//     }
// }

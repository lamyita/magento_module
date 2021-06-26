<?php

namespace Egio\EgioReinsurance\Block\Adminhtml\Reviews\Edit;
/**
 * Class Form
 * @package Egio\EgioReinsurance\Block\Adminhtml\Reviews\Edit
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var
     */
    protected $_systemStore;

    /**
     * @var \Egio\EgioReinsurance\Model\Source\options
     */
    protected $_options;

    /**
     * Form constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param \Egio\EgioReinsurance\Model\Source\options $options
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Egio\EgioReinsurance\Model\Source\options $options,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_options = $options;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Form
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(['data' => ['id' => 'edit_form', 'enctype' => 'multipart/form-data', 'action' => $this->getData('action'), 'method' => 'post']]);
        $form->setHtmlIdPrefix('md_cr_');
        if ($model) {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('reinsurance Details'), 'class' => 'fieldset-wide']);
            $fieldset->addField('reassurance_id', 'hidden', ['name' => 'reassurance_id']);
        } else {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('reinsurance Details'), 'class' => 'fieldset-wide']);
        }
        $fieldset->addField(
            'Libelle',
            'text',
            [
                'name' => 'Libelle',
                'label' => __('Libelle'),
                'title' => __('Customer Libelle'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => $model ? true : false,
            ]
        );
        $fieldset->addField(
            'Description',
            'text',
            [
                'name' => 'Description',
                'label' => __('Description'),
                'title' => __('Description'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => $model ? true : false,
            ]
        );
        $fieldset->addField(
            'Alt',
            'text',
            [
                'name' => 'Alt',
                'label' => __('Alt'),
                'title' => __('Alt'),
                'required' => false,
                'disabled' => $model ? true : false,
            ]
        );
        $fieldset->addField(
            'Statut',
            'text',
            [
                'name' => 'Statut',
                'label' => __('Statut'),
                'title' => __('Statut'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => $model ? true : false,
            ]
        );

        // $fieldset->addField(
        //     'Ordre',
        //     'select',
        //     [
        //         'name' => 'Ordre',
        //         'label' => __('Ordre'),
        //         'title' => __('Ordre'),
        //         'required' => false,
        //         'disabled' => $model ? true : false,
        //     ]
        // );


        $fieldset->addField(
            'Ordre',
            'select',
            [
                'name' => 'Ordre',
                'label' => __('Ordre'),
                'id' => 'options',
                'title' => __('Ordre'),
                // 'class' => 'required-entry options',
                'values' => $this->_options->toOptionArray(),
                // 'required' => true,
            ]
        );
 
        $fieldset->addField(
            'Lien',
            'text',
            [
                'name' => 'Lien',
                'label' => __('Lien'),
                'title' => __('Lien'),
                'required' => false,
                'disabled' => $model ? true : false,
            ]
        );

        $fieldset->addField(
            'Title_du_lien',
            'text',
            [
                'name' => 'Title_du_lien',
                'label' => __('Title_du_lien'),
                'title' => __('Title_du_lien'),
                'class' => 'required-entry',
                'required' => false,
                'disabled' => $model ? true : false,
            ]
        );

      

        $fieldset->addField(
            'Nouvelle_fenêtre',
            'select',
            [
                'name' => 'Nouvelle_fenêtre',
                'label' => __('Nouvelle_fenêtre'),
                'id' => 'options',
                'title' => __('options'),
                // 'class' => 'required-entry options',
                'values' => $this->_options->toOptionArray(),
                // 'required' => true,
            ]
        );
 

        $fieldset->addField(
            'Created',
            'text',
            [
                'name' => 'Created',
                'label' => __('Created'),
                'title' => __('Created'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => $model ? true : false,
            ]
        );


        $fieldset->addField(
            'Modified',
            'text',
            [
                'name' => 'Modified',
                'label' => __('Modified'),
                'title' => __('Modified'),
                'class' => 'required-entry',
                'required' => true,
                'disabled' => $model ? true : false,
            ]
        );
       

        $form->setValues($model ? $model->getData() : '');
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}

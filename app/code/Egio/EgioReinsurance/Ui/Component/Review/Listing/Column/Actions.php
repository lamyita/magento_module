<?php
namespace Egio\EgioReinsurance\Ui\Component\Review\Listing\Column;


use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;


/**
 * Class Actions
 * @package Egio\EgioReinsurance\Ui\Component\Review\Listing\Column
 */
class Actions extends Column
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $storeId = $this->context->getFilterParam('store_id');

            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(
                        'md_cr/index/edit',
                        ['id' => $item['reassurance_id'], 'store' => $storeId]
                        
                    ),
                    'label' => __('Edit'),
                    'hidden' => false,
                    '__disableTmpl' => true

                   ];

                   $item[$this->getData('name')]['view'] = [
                                    'href' => $this->urlBuilder->getUrl(
                                        'md_front/index/index',
                                        // ['id' => $item['reassurance_id'], 'store' => $storeId]
                                        
                                    ),
                                    'label' => __('view'),
                                    'hidden' => false,
                                    '__disableTmpl' => true
                                ];
                   
            }
        }

        return $dataSource;

        
    }



    // public function prepareDataSourceview(array $dataSource)
    // {
    //     if (isset($dataSource['data']['items'])) {
    //         $storeId = $this->context->getFilterParam('store_id');

    //         foreach ($dataSource['data']['items'] as &$item) {
    //             $item[$this->getData('name')]['view'] = [
    //                 'href' => $this->urlBuilder->getUrl(
    //                     'md_cr/index/view',
    //                     ['id' => $item['reassurance_id'], 'store' => $storeId]
                        
    //                 ),
    //                 'label' => __('view'),
    //                 'hidden' => false,
    //                 '__disableTmpl' => true
    //             ];
    //         }
    //     }

    //     return $dataSource;
    // }
}

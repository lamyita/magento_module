<?php

namespace Egio\EgioReinsurance\Ui\DataProvider\Reviews;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

/**
 * Class Collection
 * @package Egio\Grid\Ui\DataProvider\Category\Listing
 */
class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('reassurance_id', 'main_table.reassurance_id');
        $this->addFilterToMap('Libelle', 'mdEgioReinsurances.Libelle');
        parent::_initSelect();
    }
}

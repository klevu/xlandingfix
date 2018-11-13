<?php
/**
 * @author Klevu
 * @copyright Copyright (c) 2018 Amasty (https://www.amasty.com)
 * @package Amasty_Xlanding - fix
 */

namespace Klevu\XlandingFix\Model\Plugin;

class ProductListToolbar
{
    protected $_coreRegistry;

    public function __construct(
        \Magento\Framework\Registry $coreRegistry
    ){
        $this->_coreRegistry = $coreRegistry;
    }

    public function beforeSetDefaultOrder(\Magento\Catalog\Block\Product\ProductList\Toolbar $toolbar, $sortField)
    {
        $page = $this->_coreRegistry->registry('amasty_xlanding_page');

        if ($page && $page->getDefaultSortBy()) {
            $sortField = $page->getDefaultSortBy();
        }

        return [ $sortField ];
    }
}
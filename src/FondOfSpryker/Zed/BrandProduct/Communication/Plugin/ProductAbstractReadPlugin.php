<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginReadInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\BrandProduct\Communication\BrandProductCommunicationFactory getFactory()
 */
class ProductAbstractReadPlugin extends AbstractPlugin implements ProductAbstractPluginReadInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function read(ProductAbstractTransfer $productAbstractTransfer)
    {
        return $this->getFacade()->expandProductAbstractTransferWithBrand($productAbstractTransfer);
    }
}

<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin;

use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Product\Dependency\Plugin\ProductAbstractPluginCreateInterface;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\BrandProduct\Communication\BrandProductCommunicationFactory getFactory()
 */
class ProductAbstractAfterCreatePlugin extends AbstractPlugin implements ProductAbstractPluginCreateInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function create(ProductAbstractTransfer $productAbstractTransfer)
    {
        return $this->getFacade()->createProductAbstractBrands($productAbstractTransfer);
    }
}

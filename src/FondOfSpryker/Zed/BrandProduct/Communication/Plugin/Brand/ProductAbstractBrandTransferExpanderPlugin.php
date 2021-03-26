<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Brand;

use FondOfSpryker\Zed\Brand\Dependency\Plugin\BrandTransferExpanderPluginInterface;
use Generated\Shared\Transfer\BrandTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\BrandProductConfig getConfig()
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface getFacade()
 */
class ProductAbstractBrandTransferExpanderPlugin extends AbstractPlugin implements BrandTransferExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandTransfer(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFacade()->expandBrandTransferWithProductAbstractRelation($brandTransfer);
    }
}

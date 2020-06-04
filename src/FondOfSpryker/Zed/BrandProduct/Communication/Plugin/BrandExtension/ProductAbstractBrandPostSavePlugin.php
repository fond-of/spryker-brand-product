<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandExtension;

use FondOfSpryker\Zed\BrandExtension\Dependency\Plugin\BrandPostSavePluginInterface;
use Generated\Shared\Transfer\BrandTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\BrandProduct\BrandProductConfig getConfig()
 */
class ProductAbstractBrandPostSavePlugin extends AbstractPlugin implements BrandPostSavePluginInterface
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
    public function execute(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFacade()->saveBrandProductAbstractRelation($brandTransfer);
    }
}

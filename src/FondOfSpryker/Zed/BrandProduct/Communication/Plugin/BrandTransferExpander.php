<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin;

use FondOfSpryker\Zed\Brand\Dependency\Plugin\BrandTransferExpanderPluginInterface;
use Generated\Shared\Transfer\BrandTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface getFacade()
 */
class BrandTransferExpander extends AbstractPlugin implements BrandTransferExpanderPluginInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandTransfer(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFacade()->expandBrandTransferWithProductAbstractRelations($brandTransfer);
    }
}

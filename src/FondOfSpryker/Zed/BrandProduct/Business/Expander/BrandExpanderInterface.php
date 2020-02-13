<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Expander;

use Generated\Shared\Transfer\BrandTransfer;

interface BrandExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer;
}

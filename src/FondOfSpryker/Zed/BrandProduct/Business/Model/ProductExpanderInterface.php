<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\ProductAbstractTransfer;

interface ProductExpanderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractTransferWithBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}

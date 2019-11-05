<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}

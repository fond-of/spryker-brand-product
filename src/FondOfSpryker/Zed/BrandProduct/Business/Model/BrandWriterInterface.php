<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function createProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function updateProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}

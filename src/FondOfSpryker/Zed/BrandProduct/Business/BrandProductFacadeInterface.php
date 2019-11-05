<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductFacadeInterface
{
    /**
     * Specification:
     * - Find brand by product abstract id
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandsByProductAbstractId(int $idProductAbstract): BrandCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}

<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductFacadeInterface
{
    /**
     * Specifications:
     * - Finds brand by product abstract id
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandsByProductAbstractId(int $idProductAbstract): BrandCollectionTransfer;

    /**
     * Specifications:
     * - Saves relation between product abstract and brand
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;
}

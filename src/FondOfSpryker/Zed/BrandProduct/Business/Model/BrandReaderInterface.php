<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByIdProductAbstractId(
        ProductAbstractTransfer $productAbstractTransfer
    ): BrandCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function getFirstBrandByProductAbstractId(
        ProductAbstractTransfer $productAbstractTransfer
    ): ?BrandTransfer;

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getProductAbstractCollectionByBrand(
        BrandTransfer $brandTransfer
    ): BrandProductAbstractRelationTransfer;
}

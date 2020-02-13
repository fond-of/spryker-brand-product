<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductAbstractRelationReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getBrandProductAbstractRelation(
        BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
    ): BrandProductAbstractRelationTransfer;

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByIdProductAbstractId(
        ProductAbstractTransfer $productAbstractTransfer
    ): BrandCollectionTransfer;
}

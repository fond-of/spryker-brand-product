<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductFacadeInterface
{
    /**
     * Specification:
      * - Expands product abstract transfer with BrandTransfer.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractTransferWithBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer;

    /**
     * Specification:
     * - Expands brand transfer with BrandProductAbstractRelationTransfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelations(BrandTransfer $brandTransfer): BrandTransfer;
}

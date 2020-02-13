<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandResponseTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

interface BrandProductFacadeInterface
{
    /**
     * Specification:
     * - Finds abstract product by brand.
     * - Expands brand transfer with BrandProductAbstractRelationTransfer
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer;

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

    /**
     * Specification:
     * - Save Brand Product Abstract relation using BrandTransfer.
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function saveBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer;

    /**
     * Specification:
     * - Delete Brand Product Abstract relation using BrandTransfer.
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandResponseTransfer
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandResponseTransfer;
}

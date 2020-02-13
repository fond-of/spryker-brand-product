<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandProductTransfer;
use Generated\Shared\Transfer\BrandTransfer;

interface BrandProductEntityManagerInterface
{
    /**
     * Delete brand relation by product abstract id
     *
     * @param int $idProductAbstract
     *
     * @return void
     */
    public function deleteByProductAbstractId(int $idProductAbstract): void;

    /**
     * @param \Generated\Shared\Transfer\BrandProductTransfer $brandProductTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductTransfer
     */
    public function saveBrandProduct(
        BrandProductTransfer $brandProductTransfer
    ): BrandProductTransfer;

    /**
     * Delete brand product relation
     *
     * @param int $idProductAbstract
     * @param array $brandIds
     *
     * @return void
     */
    public function deleteBrandProductRelations(int $idProductAbstract, array $brandIds): void;

    /**
     * @param int $idBrand
     * @param array $productAbstractIds
     */
    public function addProductAbstractRelations(int $idBrand, array $productAbstractIds): void;

    /**
     * @param int $idBrand
     * @param int[] $productAbstractIds
     *
     * @return void
     */
    public function removeProductAbstractRelations(int $idBrand, array $productAbstractIds): void;

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): void;
}

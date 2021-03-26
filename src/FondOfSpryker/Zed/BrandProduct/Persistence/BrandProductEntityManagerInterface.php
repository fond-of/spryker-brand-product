<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandProductTransfer;
use Generated\Shared\Transfer\BrandTransfer;

interface BrandProductEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandProductTransfer $brandProductTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductTransfer
     */
    public function saveBrandProduct(
        BrandProductTransfer $brandProductTransfer
    ): BrandProductTransfer;

    /**
     * @param int $idBrand
     * @param array $productAbstractIds
     *
     * @return void
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
     *
     * @return void
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): void;
}

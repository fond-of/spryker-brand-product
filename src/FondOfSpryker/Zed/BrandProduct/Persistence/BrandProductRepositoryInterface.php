<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandCollectionTransfer;

interface BrandProductRepositoryInterface
{
    /**
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByAbstractIdProduct(int $idProduct): BrandCollectionTransfer;

    /**
     * @param int $idBrand
     *
     * @return int[]
     */
    public function getRelatedProductAbstractIdsByIdBrand(int $idBrand): array;
}

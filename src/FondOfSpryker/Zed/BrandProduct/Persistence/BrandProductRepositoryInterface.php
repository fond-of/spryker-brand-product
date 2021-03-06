<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;

interface BrandProductRepositoryInterface
{
    /**
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByAbstractIdProduct(int $idProduct): BrandCollectionTransfer;

    /**
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function getFirstBrandByProductAbstractId(int $idProduct): ?BrandTransfer;

    /**
     * @param int $idBrand
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getProductAbstractCollectionByBrandId(int $idBrand): BrandProductAbstractRelationTransfer;

    /**
     * @param int $idBrand
     *
     * @return int[]
     */
    public function getRelatedProductAbstractIdsByIdBrand(int $idBrand): array;
}

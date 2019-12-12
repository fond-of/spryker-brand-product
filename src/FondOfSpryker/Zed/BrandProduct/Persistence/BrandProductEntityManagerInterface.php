<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandProductTransfer;

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
}

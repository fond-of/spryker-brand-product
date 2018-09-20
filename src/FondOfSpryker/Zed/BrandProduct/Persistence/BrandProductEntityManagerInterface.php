<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

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
     * Add brand product relation
     *
     * @param int $idProductAbstract
     * @param array $brandIds
     *
     * @return void
     */
    public function addBrandProductRelations(int $idProductAbstract, array $brandIds): void;

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

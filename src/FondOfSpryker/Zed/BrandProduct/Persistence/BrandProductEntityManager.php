<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Orm\Zed\BrandProduct\Persistence\FosBrandProduct;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductPersistenceFactory getFactory()
 */
class BrandProductEntityManager extends AbstractEntityManager implements BrandProductEntityManagerInterface
{
    /**
     * Delete brand relation by product abstract id
     *
     * @param int $idProductAbstract
     *
     * @return void
     */
    public function deleteByProductAbstractId(int $idProductAbstract): void
    {
        $this->getFactory()
            ->getBrandProductQuery()
            ->filterByFkProductAbstract_In([$idProductAbstract])
            ->delete();
    }

    /**
     * Add brand product relation
     *
     * @param int $idProductAbstract
     * @param array $brandIds
     *
     * @return void
     */
    public function addBrandProductRelations(int $idProductAbstract, array $brandIds): void
    {
        if (count($brandIds) === 0) {
            return;
        }

        foreach ($brandIds as $brandId) {
            $entity = new FosBrandProduct();
            $entity->setFkProductAbstract($idProductAbstract)
                ->setFkBrand($brandId)
                ->save();
        }
    }

    /**
     * Delete brand product relation
     *
     * @param int $idProductAbstract
     * @param array $brandIds
     *
     * @return void
     */
    public function deleteBrandProductRelations(int $idProductAbstract, array $brandIds): void
    {
        if (count($brandIds) === 0) {
            return;
        }

        $this->getFactory()
            ->getBrandProductQuery()
            ->filterByFkProductAbstract($idProductAbstract)
            ->filterByFkBrand_In($brandIds)
            ->delete();
    }
}

<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandProductTransfer;
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
     * @param \Generated\Shared\Transfer\BrandProductTransfer $brandProductTransfer
     * @return \Generated\Shared\Transfer\BrandProductTransfer
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     */
    public function saveBrandProduct(
        BrandProductTransfer $brandProductTransfer
    ): BrandProductTransfer {

        $fosBrandProduct = $this->getFactory()
            ->createBrandProductQuery()
            ->filterByFkProductAbstract($brandProductTransfer->getFkProductAbstract())
            ->findOneOrCreate();

        $fosBrandProduct = $this->getFactory()
            ->createBrandProductMapper()
            ->mapTransferToEntity($brandProductTransfer, $fosBrandProduct);

        $fosBrandProduct->save();

        return $brandProductTransfer;

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

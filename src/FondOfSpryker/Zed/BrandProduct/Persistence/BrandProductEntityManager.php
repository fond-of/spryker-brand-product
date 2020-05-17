<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandProductTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Orm\Zed\BrandProduct\Persistence\FosBrandProduct;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductPersistenceFactory getFactory()
 */
class BrandProductEntityManager extends AbstractEntityManager implements BrandProductEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandProductTransfer $brandProductTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductTransfer
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
     * @param int $idBrand
     * @param array $productAbstractIds
     *
     * @return void
     */
    public function addProductAbstractRelations(int $idBrand, array $productAbstractIds): void
    {
        foreach ($productAbstractIds as $idProductAbstract) {
            $brandProductEntity = new FosBrandProduct();
            $brandProductEntity->setFkBrand($idBrand)
                ->setFkProductAbstract($idProductAbstract)
                ->save();
        }
    }

    /**
     * @param int $idBrand
     * @param array $productAbstractIds
     *
     * @return void
     */
    public function removeProductAbstractRelations(int $idBrand, array $productAbstractIds): void
    {
        if (!$productAbstractIds) {
            return;
        }

        $brandProductAbstractEntities = $this->getFactory()
            ->createBrandProductQuery()
            ->filterByFkBrand($idBrand)
            ->filterByFkProductAbstract_In($productAbstractIds)
            ->find();

        foreach ($brandProductAbstractEntities as $brandProductAbstractEntity) {
           // $brandProductAbstractEntity->delete();
        }
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return void
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): void
    {
        $brandProductAbstractEntities = $this->getFactory()
            ->createBrandProductQuery()
            ->filterByFkBrand($brandTransfer->getIdBrand())
            ->find();

        foreach ($brandProductAbstractEntities as $brandProductAbstractEntity) {
            $brandProductAbstractEntity->delete();
        }
    }
}

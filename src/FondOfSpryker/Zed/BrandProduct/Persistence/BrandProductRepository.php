<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductPersistenceFactory getFactory()
 */
class BrandProductRepository extends AbstractRepository implements BrandProductRepositoryInterface
{
    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByAbstractIdProduct(int $idProductAbstract): BrandCollectionTransfer
    {
        /** @var \Orm\Zed\Brand\Persistence\FosBrand[] $brandEntities */
        $brandEntities = $this->getFactory()
            ->getBrandQuery()
            ->useFosBrandProductQuery()
                ->filterByFkProductAbstract($idProductAbstract)
            ->endUse()
            ->find();

        $brandCollectionTransfer = new BrandCollectionTransfer();
        $brandProductMapper = $this->getFactory()->createBrandProductMapper();

        foreach ($brandEntities as $brandEntity) {
            $brandCollectionTransfer->addBrand(
                $brandProductMapper->mapBrand($brandEntity, new BrandTransfer())
            );
        }

        return $brandCollectionTransfer;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function getFirstBrandByProductAbstractId(int $idProductAbstract): ?BrandTransfer
    {
        /** @var \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\Brand\Persistence\FosBrand[] $brandEntities */
        $brandEntities = $this->getFactory()
            ->getBrandQuery()
            ->useFosBrandProductQuery()
                ->filterByFkProductAbstract($idProductAbstract)
            ->endUse()
            ->limit(1)
            ->find();

        if ($brandEntities->isEmpty() === false) {
            $brandProductMapper = $this->getFactory()->createBrandProductMapper();
            return $brandProductMapper->mapBrand($brandEntities->getFirst(), new BrandTransfer());
        }

        return null;
    }

    /**
     * @param int $idBrand
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getProductAbstractCollectionByBrandId(int $idBrand): BrandProductAbstractRelationTransfer
    {
        /** @var \Orm\Zed\BrandProduct\Persistence\FosBrandProduct[] $brandProductEntities */
        $brandProductEntities = $this->getFactory()
            ->getBrandProductQuery()
            ->findByFkBrand($idBrand);

        $productAbstractIds = [];
        foreach ($brandProductEntities as $entity) {
            $productAbstractIds[] = $entity->getFkProductAbstract();
        }

        $brandCollectionTransfer = new BrandProductAbstractRelationTransfer();
        $brandCollectionTransfer->setIdBrand($idBrand);
        $brandCollectionTransfer->setProductAbstractIds($productAbstractIds);

        return $brandCollectionTransfer;
    }
}

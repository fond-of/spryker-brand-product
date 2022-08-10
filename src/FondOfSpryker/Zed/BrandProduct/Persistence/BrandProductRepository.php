<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Orm\Zed\BrandProduct\Persistence\Map\FosBrandProductTableMap;
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
        /** @var array<\Orm\Zed\Brand\Persistence\FosBrand> $brandEntities */
        $brandEntities = $this->getFactory()
            ->getBrandQuery()
            ->useFosBrandProductQuery()
                ->filterByFkProductAbstract($idProductAbstract)
            ->endUse()
            ->find();

        $brandCollectionTransfer = new BrandCollectionTransfer();
        $brandProductMapper = $this->getFactory()->createBrandMapper();

        foreach ($brandEntities as $brandEntity) {
            $brandCollectionTransfer->addBrand(
                $brandProductMapper->mapEntityToTransfer($brandEntity, new BrandTransfer()),
            );
        }

        return $brandCollectionTransfer;
    }

    /**
     * @param int $idBrand
     *
     * @return array<int>
     */
    public function getRelatedProductAbstractIdsByIdBrand(int $idBrand): array
    {
        $brandProductQuery = $this->getFactory()
            ->createBrandProductQuery()
            ->select(FosBrandProductTableMap::COL_FK_PRODUCT_ABSTRACT);

        return $brandProductQuery
            ->filterByFkBrand($idBrand)
            ->find()
            ->toArray();
    }
}

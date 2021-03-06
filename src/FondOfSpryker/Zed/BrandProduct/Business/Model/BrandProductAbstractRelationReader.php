<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductAbstractRelationReader implements BrandProductAbstractRelationReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface
     */
    protected $brandProductRepository;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface $brandProductRepository
     */
    public function __construct(BrandProductRepositoryInterface $brandProductRepository)
    {
        $this->brandProductRepository = $brandProductRepository;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getBrandProductAbstractRelation(
        BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
    ): BrandProductAbstractRelationTransfer {
        $brandProductAbstractRelationTransfer->requireIdBrand();
        $productAbstractIds = $this->brandProductRepository->getRelatedProductAbstractIdsByIdBrand($brandProductAbstractRelationTransfer->getIdBrand());
        $brandProductAbstractRelationTransfer->setProductAbstractIds($productAbstractIds);

        return $brandProductAbstractRelationTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productTransfer
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByIdProductAbstractId(ProductAbstractTransfer $productAbstractTransfer): BrandCollectionTransfer
    {
        $productAbstractTransfer->requireIdProductAbstract();

        return $this->brandProductRepository->getBrandCollectionByAbstractIdProduct($productAbstractTransfer->getIdProductAbstract());
    }
}

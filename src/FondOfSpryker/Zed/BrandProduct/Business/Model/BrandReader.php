<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandProductRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandReader implements BrandReaderInterface
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
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productTransfer
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandCollectionByIdProductAbstractId(ProductAbstractTransfer $productAbstractTransfer): BrandCollectionTransfer
    {
        $productAbstractTransfer->requireIdProductAbstract();

        return $this->brandProductRepository->getBrandCollectionByAbstractIdProduct($productAbstractTransfer->getIdProductAbstract());
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function getFirstBrandByProductAbstractId(ProductAbstractTransfer $productAbstractTransfer): BrandTransfer
    {
        $productAbstractTransfer->requireIdProductAbstract();

        return $this->brandProductRepository->getFirstBrandByProductAbstractId($productAbstractTransfer->getIdProductAbstract());
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getProductAbstractCollectionByBrand(BrandTransfer $brandTransfer): BrandProductAbstractRelationTransfer
    {
        $brandTransfer->requireIdBrand();

        return $this->brandProductRepository->getProductAbstractCollectionByBrandId($brandTransfer->getIdBrand());
    }
}

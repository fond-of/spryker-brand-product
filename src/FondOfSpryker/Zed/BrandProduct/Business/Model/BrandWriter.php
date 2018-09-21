<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandWriter implements BrandWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface
     */
    protected $brandProductEntityManager;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface
     */
    protected $brandProductReader;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface $brandProductEntityManager
     * @param \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface $brandProductReader
     */
    public function __construct(
        BrandProductEntityManagerInterface $brandProductEntityManager,
        BrandReaderInterface $brandProductReader
    ) {
        $this->brandProductEntityManager = $brandProductEntityManager;
        $this->brandProductReader = $brandProductReader;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     */
    public function createProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        if ($productAbstractTransfer->getBrandCollection() !== null) {
            $requestedBrandIds = $this->getBrandIds($productAbstractTransfer->getBrandCollection());

            if (count($requestedBrandIds) > 0) {
                $this->brandProductEntityManager->addBrandProductRelations($productAbstractTransfer->getIdProductAbstract(), $requestedBrandIds);
            }

            $productAbstractTransfer->setBrandCollection($this->brandProductReader->getBrandCollectionByIdProductAbstractId($productAbstractTransfer));
        }

        return $productAbstractTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function updateProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        if ($productAbstractTransfer->getBrandCollection() === null || $productAbstractTransfer->getBrandCollection()->getBrands()->count() < 1) {
            // delete existing relations!
            $this->brandProductEntityManager->deleteByProductAbstractId($productAbstractTransfer->getIdProductAbstract());
            return $productAbstractTransfer;
        }

        $requestedBrandIds = $this->getBrandIds($productAbstractTransfer->getBrandCollection());
        $existingBrandIds = $this->getBrandIds($this->brandProductReader->getBrandCollectionByIdProductAbstractId($productAbstractTransfer));

        $saveBrandIds = array_diff($requestedBrandIds, $existingBrandIds);
        $deleteBrandIds = array_diff($existingBrandIds, $requestedBrandIds);

        $this->brandProductEntityManager->addBrandProductRelations($productAbstractTransfer->getIdProductAbstract(), $saveBrandIds);
        $this->brandProductEntityManager->deleteBrandProductRelations($productAbstractTransfer->getIdProductAbstract(), $deleteBrandIds);

        return $productAbstractTransfer->setBrandCollection($this->brandProductReader->getBrandCollectionByIdProductAbstractId($productAbstractTransfer));
    }

    /**
     * Get brand ids
     *
     * @param \Generated\Shared\Transfer\BrandCollectionTransfer $brandCollectionTransfer
     *
     * @return array
     */
    protected function getBrandIds(BrandCollectionTransfer $brandCollectionTransfer): array
    {
        $ids = [];
        foreach ($brandCollectionTransfer->getBrands() as $brandTransfer) {
            $ids[] = $brandTransfer->getIdBrand();
        }
        return $ids;
    }
}

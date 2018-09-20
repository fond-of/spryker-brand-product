<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class ProductExpander implements ProductExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface
     */
    protected $brandReader;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface $brandReader
     */
    public function __construct(BrandReaderInterface $brandReader)
    {
        $this->brandReader = $brandReader;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractTransferWithBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $productAbstractTransfer->setBrandCollection(new BrandCollectionTransfer());

        $brandCollection = $this->brandReader->getBrandCollectionByIdProductAbstractId(
            $productAbstractTransfer
        );

        if ($brandCollection->getBrands()->count() > 0) {
            $productAbstractTransfer->setBrandCollection($brandCollection);
        }

        return $productAbstractTransfer;
    }
}

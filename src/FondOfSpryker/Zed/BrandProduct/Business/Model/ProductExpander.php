<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandTransfer;
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
        $productAbstractTransfer->setBrand(new BrandTransfer());

        // currenty one product has only one brand!
        $brandTransfer = $this->brandReader->getFirstBrandByProductAbstractId(
            $productAbstractTransfer
        );

        if ($brandTransfer !== null) {
            $productAbstractTransfer->setBrand($brandTransfer);
        }

        return $productAbstractTransfer;
    }
}

<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandProductRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;

class BrandExpander implements BrandExpanderInterface
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
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelations(BrandTransfer $brandTransfer): BrandTransfer
    {
        $brandTransfer->setBrandProductAbstractRelation(new BrandProductAbstractRelationTransfer());

        $brandCollectionTransfer = $this->brandReader->getProductAbstractCollectionByBrand(
            $brandTransfer
        );

        $this->addProductAbstractRelationsToBrandTransfer($brandTransfer, $brandCollectionTransfer);

        return $brandTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return void
     */
    protected function addProductAbstractRelationsToBrandTransfer(
        BrandTransfer $brandTransfer, BrandProductAbstractRelationTransfer
        $brandProductAbstractRelationTransfer
    ): void
    {
        $brandTransfer->setBrandProductAbstractRelation($brandProductAbstractRelationTransfer);
    }
}

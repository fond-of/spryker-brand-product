<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Expander;

use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;

class BrandExpander implements BrandExpanderInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface
     */
    protected $brandProductAbstractRelationReader;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface $brandProductAbstractRelationReader
     */
    public function __construct(BrandProductAbstractRelationReaderInterface $brandProductAbstractRelationReader)
    {
        $this->brandProductAbstractRelationReader = $brandProductAbstractRelationReader;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer
    {
        $brandProductAbstractRelationTransfer = (new BrandProductAbstractRelationTransfer())
            ->setIdBrand($brandTransfer->getIdBrand());

        $brandTransfer->setBrandProductAbstractRelation($brandProductAbstractRelationTransfer);

        $brandProductAbstractRelationTransfer = $this->brandProductAbstractRelationReader
            ->getBrandProductAbstractRelation($brandTransfer->getBrandProductAbstractRelation());

        $brandTransfer->setBrandProductAbstractRelation($brandProductAbstractRelationTransfer);

        return $brandTransfer;
    }
}

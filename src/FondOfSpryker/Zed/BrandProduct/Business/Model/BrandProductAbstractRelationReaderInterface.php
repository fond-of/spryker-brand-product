<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;

interface BrandProductAbstractRelationReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer
     */
    public function getBrandProductAbstractRelation(
        BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
    ): BrandProductAbstractRelationTransfer;
}

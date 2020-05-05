<?php

namespace FondOfSpryker\Zed\BrandProduct\Dependency\Facade;

use Generated\Shared\Transfer\BrandTransfer;

interface BrandProductToBrandFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function findBrandByName(BrandTransfer $brandTransfer): ?BrandTransfer;
}

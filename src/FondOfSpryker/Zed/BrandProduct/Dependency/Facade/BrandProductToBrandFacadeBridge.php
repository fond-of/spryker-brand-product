<?php

namespace FondOfSpryker\Zed\BrandProduct\Dependency\Facade;

use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use Generated\Shared\Transfer\BrandTransfer;

class BrandProductToBrandFacadeBridge implements BrandProductToBrandFacadeInterface
{
    /**
     * @var \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacade;

    /**
     * @param \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface $brandFacade
     */
    public function __construct(BrandFacadeInterface $brandFacade)
    {
        $this->brandFacade = $brandFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    public function findBrandByName(BrandTransfer $brandTransfer): ?BrandTransfer
    {
        return $this->brandFacade->findBrandByName($brandTransfer);
    }
}

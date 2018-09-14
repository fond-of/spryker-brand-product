<?php

namespace FondOfSpryker\Zed\BrandProduct\Dependency\Facade;

class BrandProductToProductFacadeBridge implements BrandProductToProductFacadeInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct($productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param string $concreteSku
     *
     * @return int
     */
    public function getProductAbstractIdByConcreteSku($concreteSku): int
    {
        return $this->productFacade->getProductAbstractIdByConcreteSku($concreteSku);
    }
}

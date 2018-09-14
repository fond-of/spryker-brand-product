<?php

namespace FondOfSpryker\Zed\BrandProduct\Dependency\Facade;

interface BrandProductToProductFacadeInterface
{
    /**
     * @param string $concreteSku
     *
     * @return int
     */
    public function getProductAbstractIdByConcreteSku($concreteSku): int;
}

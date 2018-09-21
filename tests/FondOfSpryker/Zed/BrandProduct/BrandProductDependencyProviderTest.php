<?php

namespace FondOfSpryker\Zed\BrandProduct;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class BrandProductDependencyProviderTest extends Unit
{
    /**
     * @var \Spryker\Zed\Kernel\Container
     */
    protected $container;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\BrandProductDependencyProvider
     */
    protected $brandProductDependencyProvider;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->container = new Container();
        $this->brandProductDependencyProvider = new BrandProductDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $this->brandProductDependencyProvider->providePersistenceLayerDependencies($this->container);
        $this->assertArrayHasKey(BrandProductDependencyProvider::PROPEL_QUERY_BRAND, $this->container);
        $this->assertArrayHasKey(BrandProductDependencyProvider::PROPEL_QUERY_BRAND_PRODUCT, $this->container);
    }
}

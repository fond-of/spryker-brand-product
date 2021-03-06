<?php

namespace FondOfSpryker\Zed\BrandProduct;

use Orm\Zed\Brand\Persistence\FosBrandQuery;
use Orm\Zed\BrandProduct\Persistence\FosBrandProductQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class BrandProductDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_BRAND = 'PROPEL_QUERY_BRAND';
    public const PROPEL_QUERY_BRAND_PRODUCT = 'PROPEL_QUERY_BRAND_PRODUCT';

    public const FACADE_BRAND = 'facade_brand';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addBrandFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = parent::providePersistenceLayerDependencies($container);

        $container = $this->addBrandPropelQuery($container);
        $container = $this->addBrandProductPropelQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addBrandFacade(Container $container): Container
    {
        $container[static::FACADE_BRAND] = static function (Container $container) {
            return $container->getLocator()->brand()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addBrandPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_BRAND] = static function () {
            return FosBrandQuery::create();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addBrandProductPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_BRAND_PRODUCT] = static function () {
            return FosBrandProductQuery::create();
        };

        return $container;
    }
}

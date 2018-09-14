<?php

namespace FondOfSpryker\Zed\BrandProduct;

use FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToProductFacadeBridge;
use Orm\Zed\Brand\Persistence\FosBrandQuery;
use Orm\Zed\BrandProduct\Persistence\FosBrandProductQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class BrandProductDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PROPEL_QUERY_BRAND = 'PROPEL_QUERY_BRAND';
    public const PROPEL_QUERY_BRAND_PRODUCT = 'PROPEL_QUERY_BRAND_PRODUCT';

    const FACADE_PRODUCT = 'product facade';

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
    protected function addBrandPropelQuery(Container $container): Container
    {
        $container[static::PROPEL_QUERY_BRAND] = function (Container $container) {
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
        $container[static::PROPEL_QUERY_BRAND_PRODUCT] = function (Container $container) {
            return FosBrandProductQuery::create();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductFacade(Container $container): Container
    {
        $container[static::FACADE_PRODUCT] = function (Container $container) {
            return new BrandProductToProductFacadeBridge($container->getLocator()->product()->facade());
        };

        return $container;
    }
}

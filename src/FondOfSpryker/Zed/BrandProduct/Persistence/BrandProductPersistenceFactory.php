<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence;

use FondOfSpryker\Zed\BrandProduct\BrandProductDependencyProvider;
use FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandMapper;
use FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandMapperInterface;
use FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandProductMapper;
use FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandProductMapperInterface;
use Orm\Zed\Brand\Persistence\FosBrandQuery;
use Orm\Zed\BrandProduct\Persistence\FosBrandProductQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\BrandProductConfig getConfig()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface getRepository()
 */
class BrandProductPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Brand\Persistence\FosBrandQuery
     */
    public function getBrandQuery(): FosBrandQuery
    {
        return $this->getProvidedDependency(BrandProductDependencyProvider::PROPEL_QUERY_BRAND);
    }

    /**
     * @return \Orm\Zed\BrandProduct\Persistence\FosBrandProductQuery
     */
    public function createBrandProductQuery(): FosBrandProductQuery
    {
        return $this->getProvidedDependency(BrandProductDependencyProvider::PROPEL_QUERY_BRAND_PRODUCT);
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandProductMapperInterface
     */
    public function createBrandProductMapper(): BrandProductMapperInterface
    {
        return new BrandProductMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper\BrandMapperInterface
     */
    public function createBrandMapper(): BrandMapperInterface
    {
        return new BrandMapper();
    }
}

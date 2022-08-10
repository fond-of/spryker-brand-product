<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use FondOfSpryker\Zed\BrandProduct\BrandProductDependencyProvider;
use FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpander;
use FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpanderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReader;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriter;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriterInterface;
use FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\BrandProductConfig getConfig()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepository getRepository()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager getEntityManager()()
 */
class BrandProductBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface
     */
    public function createBrandProductAbstractRelationReader(): BrandProductAbstractRelationReaderInterface
    {
        return new BrandProductAbstractRelationReader($this->getRepository());
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriterInterface
     */
    public function createBrandProductAbstractRelationWriter(): BrandProductAbstractRelationWriterInterface
    {
        return new BrandProductAbstractRelationWriter(
            $this->getEntityManager(),
            $this->getBrandFacade(),
            $this->createBrandProductAbstractRelationReader(),
            $this->getConfig(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface
     */
    protected function getBrandFacade(): BrandProductToBrandFacadeInterface
    {
        return $this->getProvidedDependency(BrandProductDependencyProvider::FACADE_BRAND);
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpanderInterface
     */
    public function createBrandExpander(): BrandExpanderInterface
    {
        return new BrandExpander($this->createBrandProductAbstractRelationReader());
    }
}

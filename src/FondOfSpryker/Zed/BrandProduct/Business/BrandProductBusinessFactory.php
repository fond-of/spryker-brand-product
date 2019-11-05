<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use FondOfSpryker\Zed\BrandProduct\BrandProductDependencyProvider;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductWriterInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReader;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductWriter;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriterInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\BrandProductConfig getConfig()
 */
class BrandProductBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface
     */
    public function createBrandReader(): BrandReaderInterface
    {
        return new BrandReader($this->getRepository());
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductWriterInterface
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function createBrandProductWriter(): BrandProductWriterInterface
    {
        return new BrandProductWriter(
            $this->getEntityManager(),
            $this->getBrandFacade(),
            $this->createBrandReader(),
            $this->getConfig()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     *
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    protected function getBrandFacade(): BrandFacadeInterface
    {
        return $this->getProvidedDependency(BrandProductDependencyProvider::FACADE_BRAND);
    }

}

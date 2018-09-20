<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpander;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpanderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReader;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriter;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriterInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpander;
use FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpanderInterface;
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
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriterInterface
     */
    public function createBrandWriter(): BrandWriterInterface
    {
        return new BrandWriter($this->getEntityManager(), $this->createBrandReader());
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpanderInterface
     */
    public function createProductExpander(): ProductExpanderInterface
    {
        return new ProductExpander($this->createBrandReader());
    }

    /**
     * @return \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpanderInterface
     */
    public function createBrandExpander(): BrandExpanderInterface
    {
        return new BrandExpander($this->createBrandReader());
    }
}

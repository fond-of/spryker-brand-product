<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use FondOfSpryker\Zed\BrandProduct\BrandProductConfig;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface;
use Generated\Shared\Transfer\BrandProductTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductWriter implements BrandProductWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface
     */
    protected $brandProductEntityManager;

    /**
     * @var \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacade;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface
     */
    protected $brandProductReader;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\BrandProductConfig
     */
    protected $config;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface $brandProductEntityManager
     * @param \FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface $brandFacade
     * @param \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface $brandProductReader
     * @param \FondOfSpryker\Zed\BrandProduct\BrandProductConfig $config
     */
    public function __construct(
        BrandProductEntityManagerInterface $brandProductEntityManager,
        BrandFacadeInterface $brandFacade,
        BrandReaderInterface $brandProductReader,
        BrandProductConfig $config
    ) {
        $this->brandProductEntityManager = $brandProductEntityManager;
        $this->brandFacade = $brandFacade;
        $this->brandProductReader = $brandProductReader;
        $this->config = $config;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $attributes = $productAbstractTransfer->getAttributes();

        if (!array_key_exists($this->config->getBrandProductAttribute(), $attributes)) {
            return $productAbstractTransfer;
        }

        $brandTransfer = $this->getBrandIdByBrandName($attributes[$this->config->getBrandProductAttribute()]);

        if ($brandTransfer === null) {
            return $productAbstractTransfer;
        }

        $brandProductTransfer = (new BrandProductTransfer())
            ->setFkBrand($brandTransfer->getIdBrand())
            ->setFkProductAbstract($productAbstractTransfer->getIdProductAbstract());

        $this->brandProductEntityManager->saveBrandProduct($brandProductTransfer);

        return $productAbstractTransfer;
    }

    /**
     * @param string $name
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    protected function getBrandIdByBrandName(string $name): BrandTransfer
    {
        $brandTransfer = (new BrandTransfer())
            ->setName($name);

        return $this->brandFacade->findBrandByName($brandTransfer);
    }
}

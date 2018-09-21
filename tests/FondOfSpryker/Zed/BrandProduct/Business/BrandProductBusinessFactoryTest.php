<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpanderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriterInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpanderInterface;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepository;

class BrandProductBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory
     */
    protected $brandProductBusinessFactory;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepository
     */
    protected $repositoryMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager
     */
    protected $entityManagerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->repositoryMock = $this->getMockBuilder(BrandProductRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(BrandProductEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductBusinessFactory = new BrandProductBusinessFactory();
        $this->brandProductBusinessFactory->setRepository($this->repositoryMock);
        $this->brandProductBusinessFactory->setEntityManager($this->entityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreateBrandWriter(): void
    {
        $service = $this->brandProductBusinessFactory->createBrandWriter();
        $this->assertInstanceOf(BrandWriterInterface::class, $service);
    }

    /**
     * @return void
     */
    public function testCreateBrandReader(): void
    {
        $service = $this->brandProductBusinessFactory->createBrandReader();
        $this->assertInstanceOf(BrandReaderInterface::class, $service);
    }

    /**
     * @return void
     */
    public function testCreateProductExpander(): void
    {
        $service = $this->brandProductBusinessFactory->createProductExpander();
        $this->assertInstanceOf(ProductExpanderInterface::class, $service);
    }

    /**
     * @return void
     */
    public function testCreateBrandExpander(): void
    {
        $service = $this->brandProductBusinessFactory->createBrandExpander();
        $this->assertInstanceOf(BrandExpanderInterface::class, $service);
    }
}

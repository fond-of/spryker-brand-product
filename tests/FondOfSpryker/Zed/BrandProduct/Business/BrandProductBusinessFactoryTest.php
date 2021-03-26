<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\BrandProductConfig;
use FondOfSpryker\Zed\BrandProduct\BrandProductDependencyProvider;
use FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpander;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReader;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriter;
use FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepository;
use Spryker\Zed\Kernel\Container;

class BrandProductBusinessFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface
     */
    protected $brandFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\BrandProductConfig
     */
    protected $configMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepository
     */
    protected $repositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager
     */
    protected $entityManagerMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory
     */
    protected $brandProductBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandFacadeMock = $this->getMockBuilder(BrandProductToBrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->configMock = $this->getMockBuilder(BrandProductConfig::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->repositoryMock = $this->getMockBuilder(BrandProductRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->entityManagerMock = $this->getMockBuilder(BrandProductEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductBusinessFactory = new BrandProductBusinessFactory();
        $this->brandProductBusinessFactory->setContainer($this->containerMock);
        $this->brandProductBusinessFactory->setRepository($this->repositoryMock);
        $this->brandProductBusinessFactory->setEntityManager($this->entityManagerMock);
        $this->brandProductBusinessFactory->setConfig($this->configMock);
    }

    /**
     * @return void
     */
    public function testCreateBrandProductAbstractRelationReader(): void
    {
        $brandProductAbstractRelationReader = $this->brandProductBusinessFactory
            ->createBrandProductAbstractRelationReader();

        $this->assertInstanceOf(BrandProductAbstractRelationReader::class, $brandProductAbstractRelationReader);
    }

    /**
     * @return void
     */
    public function testCreateBrandProductAbstractRelationWriter(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandProductDependencyProvider::FACADE_BRAND)
            ->willReturn($this->brandFacadeMock);

        $brandProductAbstractRelationWriter = $this->brandProductBusinessFactory
            ->createBrandProductAbstractRelationWriter();

        $this->assertInstanceOf(BrandProductAbstractRelationWriter::class, $brandProductAbstractRelationWriter);
    }

    /**
     * @return void
     */
    public function testCreateBrandExpander(): void
    {
        $brandExpander = $this->brandProductBusinessFactory->createBrandExpander();

        $this->assertInstanceOf(BrandExpander::class, $brandExpander);
    }
}

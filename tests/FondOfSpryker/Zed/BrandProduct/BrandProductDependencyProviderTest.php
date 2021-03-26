<?php

namespace FondOfSpryker\Zed\BrandProduct;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeBridge;
use Spryker\Shared\Kernel\BundleProxy;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Kernel\Locator;

class BrandProductDependencyProviderTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Locator
     */
    protected $locatorMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\BundleProxy
     */
    protected $bundleProxyMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacadeMock;

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

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->setMethodsExcept(['factory', 'set', 'offsetSet', 'get', 'offsetGet', 'has', 'offsetExists'])
            ->getMock();

        $this->locatorMock = $this->getMockBuilder(Locator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->bundleProxyMock = $this->getMockBuilder(BundleProxy::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandFacadeMock = $this->getMockBuilder(BrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductDependencyProvider = new BrandProductDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('getLocator')
            ->willReturn($this->locatorMock);

        $this->locatorMock->expects($this->atLeastOnce())
            ->method('__call')
            ->with('brand')
            ->willReturn($this->bundleProxyMock);

        $this->bundleProxyMock->expects($this->atLeastOnce())
            ->method('__call')
            ->with('facade')
            ->willReturn($this->brandFacadeMock);

        $container = $this->brandProductDependencyProvider->provideBusinessLayerDependencies($this->containerMock);

        $this->assertEquals($this->containerMock, $container);
        $this->assertInstanceOf(
            BrandProductToBrandFacadeBridge::class,
            $container[BrandProductDependencyProvider::FACADE_BRAND]
        );
    }

    /**
     * @return void
     */
    public function testProvidePersistenceLayerDependencies(): void
    {
        $container = $this->brandProductDependencyProvider->providePersistenceLayerDependencies($this->containerMock);

        $this->assertArrayHasKey(BrandProductDependencyProvider::PROPEL_QUERY_BRAND, $container);
        $this->assertArrayHasKey(BrandProductDependencyProvider::PROPEL_QUERY_BRAND_PRODUCT, $container);
    }
}

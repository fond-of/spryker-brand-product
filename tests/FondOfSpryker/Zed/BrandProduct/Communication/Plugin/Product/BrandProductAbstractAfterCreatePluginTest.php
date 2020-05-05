<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Product;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductAbstractAfterCreatePluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade
     */
    protected $brandProductFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected $productAbstractTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Product\BrandProductAbstractAfterCreatePlugin
     */
    protected $brandProductAbstractAfterCreatePlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandProductFacadeMock = $this->getMockBuilder(BrandProductFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractTransferMock = $this->getMockBuilder(ProductAbstractTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductAbstractAfterCreatePlugin = new BrandProductAbstractAfterCreatePlugin();
        $this->brandProductAbstractAfterCreatePlugin->setFacade($this->brandProductFacadeMock);
    }

    /**
     * @return void
     */
    public function testExecute(): void
    {
        $this->brandProductFacadeMock->expects($this->atLeastOnce())
            ->method('saveProductAbstractBrand')
            ->with($this->productAbstractTransferMock)
            ->willReturn($this->productAbstractTransferMock);

        $productAbstractTransfer = $this->brandProductAbstractAfterCreatePlugin->create(
            $this->productAbstractTransferMock
        );

        $this->assertEquals($this->productAbstractTransferMock, $productAbstractTransfer);
    }
}

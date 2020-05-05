<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Product;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductAbstractAfterUpdatePluginTest extends Unit
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
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Product\BrandProductAbstractAfterUpdatePlugin
     */
    protected $brandProductAbstractAfterUpdatePlugin;

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

        $this->brandProductAbstractAfterUpdatePlugin = new BrandProductAbstractAfterUpdatePlugin();
        $this->brandProductAbstractAfterUpdatePlugin->setFacade($this->brandProductFacadeMock);
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

        $productAbstractTransfer = $this->brandProductAbstractAfterUpdatePlugin->update(
            $this->productAbstractTransferMock
        );

        $this->assertEquals($this->productAbstractTransferMock, $productAbstractTransfer);
    }
}

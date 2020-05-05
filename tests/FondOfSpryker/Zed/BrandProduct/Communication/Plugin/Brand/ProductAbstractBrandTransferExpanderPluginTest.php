<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Brand;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\BrandTransfer;

class ProductAbstractBrandTransferExpanderPluginTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade
     */
    protected $brandProductFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandTransfer
     */
    protected $brandTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\Brand\ProductAbstractBrandTransferExpanderPlugin
     */
    protected $productAbstractBrandTransferExpanderPlugin;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandProductFacadeMock = $this->getMockBuilder(BrandProductFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractBrandTransferExpanderPlugin = new ProductAbstractBrandTransferExpanderPlugin();
        $this->productAbstractBrandTransferExpanderPlugin->setFacade($this->brandProductFacadeMock);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->brandProductFacadeMock->expects($this->atLeastOnce())
            ->method('expandBrandTransferWithProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->productAbstractBrandTransferExpanderPlugin->expandTransfer($this->brandTransferMock);

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }
}

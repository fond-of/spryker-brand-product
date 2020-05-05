<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\BrandResponseTransfer;
use Generated\Shared\Transfer\BrandTransfer;

class ProductAbstractBrandPostDeletePluginTest extends Unit
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
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandResponseTransfer
     */
    protected $brandResponseTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandExtension\ProductAbstractBrandPostDeletePlugin
     */
    protected $productAbstractBrandPostDeletePlugin;

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

        $this->brandResponseTransferMock = $this->getMockBuilder(BrandResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractBrandPostDeletePlugin = new ProductAbstractBrandPostDeletePlugin();
        $this->productAbstractBrandPostDeletePlugin->setFacade($this->brandProductFacadeMock);
    }

    /**
     * @return void
     */
    public function testExecute(): void
    {
        $this->brandProductFacadeMock->expects($this->atLeastOnce())
            ->method('deleteBrandProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandResponseTransferMock);

        $brandResponseTransfer = $this->productAbstractBrandPostDeletePlugin->execute($this->brandTransferMock);

        $this->assertEquals($this->brandResponseTransferMock, $brandResponseTransfer);
    }
}

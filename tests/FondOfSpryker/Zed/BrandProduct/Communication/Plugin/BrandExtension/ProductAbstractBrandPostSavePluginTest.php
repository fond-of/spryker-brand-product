<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandExtension;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\BrandTransfer;

class ProductAbstractBrandPostSavePluginTest extends Unit
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
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandExtension\ProductAbstractBrandPostSavePlugin
     */
    protected $productAbstractBrandPostSavePlugin;

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

        $this->productAbstractBrandPostSavePlugin = new ProductAbstractBrandPostSavePlugin();
        $this->productAbstractBrandPostSavePlugin->setFacade($this->brandProductFacadeMock);
    }

    /**
     * @return void
     */
    public function testExecute(): void
    {
        $this->brandProductFacadeMock->expects($this->atLeastOnce())
            ->method('saveBrandProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->productAbstractBrandPostSavePlugin->execute($this->brandTransferMock);

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }
}

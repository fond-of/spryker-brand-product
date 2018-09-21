<?php

namespace FondOfSpryker\Zed\BrandProduct\Communication\Plugin;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade;
use Generated\Shared\Transfer\BrandTransfer;

class BrandTransferExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Communication\Plugin\BrandTransferExpander
     */
    protected $brandTransferExpander;

    /**
     * @var \Generated\Shared\Transfer\BrandTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacade|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductFacade = $this->getMockBuilder(BrandProductFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandTransferExpander = new BrandTransferExpander();
        $this->brandTransferExpander->setFacade($this->brandProductFacade);
    }

    /**
     * @return void
     */
    public function testExpandTransfer(): void
    {
        $this->brandProductFacade->expects($this->once())
            ->method('expandBrandTransferWithProductAbstractRelations')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->brandTransferExpander->expandTransfer($this->brandTransferMock);

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }
}

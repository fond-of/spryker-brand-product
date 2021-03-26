<?php

namespace FondOfSpryker\Zed\BrandProduct\Dependency\Facade;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface;
use Generated\Shared\Transfer\BrandTransfer;

class BrandProductToBrandFacadeBridgeTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\Brand\Business\BrandFacadeInterface
     */
    protected $brandFacadeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandTransfer
     */
    protected $brandTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeBridge
     */
    protected $brandProductToBrandFacadeBrigde;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandFacadeMock = $this->getMockBuilder(BrandFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductToBrandFacadeBrigde = new BrandProductToBrandFacadeBridge($this->brandFacadeMock);
    }

    /**
     * @return void
     */
    public function testFindBrandByName(): void
    {
        $this->brandFacadeMock->expects($this->atLeastOnce())
            ->method('findBrandByName')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->brandProductToBrandFacadeBrigde->findBrandByName($this->brandTransferMock);

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }
}

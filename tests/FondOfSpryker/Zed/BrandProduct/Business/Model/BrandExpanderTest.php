<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandTransfer;

class BrandExpanderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandReaderMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpanderInterface
     */
    protected $brandExpander;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandReaderMock = $this->getMockBuilder(BrandReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandExpander = new BrandExpander($this->brandReaderMock);
    }

    /**
     * @return void
     */
    public function testExpandBrandTransferWithProductAbstractRelations(): void
    {
        $brandTransfer = new BrandTransfer();
        $brandCollectionTransfer = new BrandProductAbstractRelationTransfer();

        $this->brandReaderMock
            ->expects($this->once())
            ->method('getProductAbstractCollectionByBrand')
            ->with($brandTransfer)
            ->willReturn($brandCollectionTransfer);

        $this->assertNull($brandTransfer->getBrandProductAbstractRelation());
        $brandTransfer = $this->brandExpander->expandBrandTransferWithProductAbstractRelations($brandTransfer);
        $this->assertInstanceOf(BrandProductAbstractRelationTransfer::class, $brandTransfer->getBrandProductAbstractRelation());

        $this->assertEquals($brandCollectionTransfer, $brandTransfer->getBrandProductAbstractRelation());
    }
}

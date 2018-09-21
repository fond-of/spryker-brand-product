<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use ArrayObject;
use Codeception\Test\Unit;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class ProductExpanderTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\BrandTransfer[]|\PHPUnit\Framework\MockObject\MockObject[]
     */
    protected $brandsMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandReaderMock;

    /**
     * @var \Generated\Shared\Transfer\BrandCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected $productAbstractTransfer;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpanderInterface
     */
    protected $productExpander;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->productAbstractTransfer = new ProductAbstractTransfer();

        $this->brandReaderMock = $this->getMockBuilder(BrandReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandsMock = [
            $this->getMockBuilder('\Generated\Shared\Transfer\BrandTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdBrand'])
                ->getMock(),
            $this->getMockBuilder('\Generated\Shared\Transfer\BrandTransfer')
                ->disableOriginalConstructor()
                ->setMethods(['getType', 'getIdBrand'])
                ->getMock(),
        ];

        $this->brandCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\BrandCollectionTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getBrands'])
            ->getMock();

        $this->productExpander = new ProductExpander($this->brandReaderMock);
    }

    /**
     * @return void
     */
    public function testExpandProductAbstractTransferWithBrandEmpty(): void
    {
        $this->brandCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn(new ArrayObject());

        $this->brandReaderMock->expects($this->atLeastOnce())
            ->method('getBrandCollectionByIdProductAbstractId')
            ->with($this->productAbstractTransfer)
            ->willReturn($this->brandCollectionTransferMock);

        $changedProductTransfer = $this->productExpander->expandProductAbstractTransferWithBrand($this->productAbstractTransfer);

        $this->assertEquals($changedProductTransfer->getBrandCollection(), new BrandCollectionTransfer());
    }

    /**
     * @return void
     */
    public function testExpandProductAbstractTransferWithBrand(): void
    {
        $this->brandCollectionTransferMock->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn(new ArrayObject($this->brandsMock));

        $this->brandReaderMock->expects($this->atLeastOnce())
            ->method('getBrandCollectionByIdProductAbstractId')
            ->with($this->productAbstractTransfer)
            ->willReturn($this->brandCollectionTransferMock);

        $changedProductTransfer = $this->productExpander->expandProductAbstractTransferWithBrand($this->productAbstractTransfer);

        $this->assertEquals($changedProductTransfer->getBrandCollection(), $this->brandCollectionTransferMock);
    }
}

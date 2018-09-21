<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use ArrayObject;
use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface;
use Generated\Shared\Transfer\BrandTransfer;

class BrandWriterTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManager|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductEntityManagerMock;

    /**
     * @var \Generated\Shared\Transfer\BrandCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductAbstractTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productAbstractTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandReaderMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandWriterInterface
     */
    protected $brandWriter;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->brandProductEntityManagerMock = $this->getMockBuilder(BrandProductEntityManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductAbstractTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getBrandCollection', 'getIdProductAbstract'])
            ->getMock();

        $this->brandCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\BrandCollectionTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['getBrands'])
            ->getMock();

        $this->brandReaderMock = $this->getMockBuilder(BrandReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandWriter = new BrandWriter($this->brandProductEntityManagerMock, $this->brandReaderMock);
    }

    /**
     * @return void
     */
    public function testUpdateProductAbstractBrandsEmptyBrandDelete1()
    {
        $this->productAbstractTransferMock
            ->expects($this->once())
            ->method('getBrandCollection')
            ->willReturn(null);

        $this->productAbstractTransferMock
            ->expects($this->once())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->brandProductEntityManagerMock->expects($this->once())
            ->method('deleteByProductAbstractId');

        $this->assertEquals($this->brandWriter->updateProductAbstractBrands($this->productAbstractTransferMock), $this->productAbstractTransferMock);
    }

    /**
     * @return void
     */
    public function testUpdateProductAbstractBrandsEmptyBrandDelete2()
    {
        $this->brandCollectionTransferMock
            ->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn(new ArrayObject());

        $this->productAbstractTransferMock
            ->expects($this->atLeastOnce())
            ->method('getBrandCollection')
            ->willReturn($this->brandCollectionTransferMock);

        $this->productAbstractTransferMock
            ->expects($this->once())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->brandProductEntityManagerMock->expects($this->once())
            ->method('deleteByProductAbstractId');

        $this->assertEquals($this->brandWriter->updateProductAbstractBrands($this->productAbstractTransferMock), $this->productAbstractTransferMock);
    }

    /**
     * @return void
     */
    public function testUpdateProductAbstractBrandsOnlyNew()
    {
        $this->brandCollectionTransferMock
            ->expects($this->atLeastOnce())
            ->method('getBrands')
            ->willReturn(new ArrayObject([
                (new BrandTransfer())
                    ->setName('test1')
                    ->setIdBrand(1),
            ]));

        $this->productAbstractTransferMock
            ->expects($this->atLeastOnce())
            ->method('getBrandCollection')
            ->willReturn($this->brandCollectionTransferMock);

        $this->productAbstractTransferMock
            ->expects($this->atLeastOnce())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->brandProductEntityManagerMock->expects($this->never())
            ->method('deleteByProductAbstractId');

        $this->brandProductEntityManagerMock->expects($this->once())
            ->method('deleteBrandProductRelations');

        $this->brandReaderMock
            ->expects($this->exactly(2))
            ->method('getBrandCollectionByIdProductAbstractId')
            ->willReturn($this->brandCollectionTransferMock);

        $result = $this->brandWriter->updateProductAbstractBrands($this->productAbstractTransferMock);

        $this->assertEquals($result, $this->productAbstractTransferMock);
    }
}

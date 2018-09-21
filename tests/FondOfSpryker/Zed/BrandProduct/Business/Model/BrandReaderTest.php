<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface;

class BrandReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductRepositoryMock;

    /**
     * @var \Generated\Shared\Transfer\BrandCollectionTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandCollectionTransferMock;

    /**
     * @var \Generated\Shared\Transfer\ProductAbstractTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $productAbstractTransferMock;

    /**
     * @var \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductAbstractRelationTransferMock;

    /**
     * @var \Generated\Shared\Transfer\BrandTransfer|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReaderInterface
     */
    protected $brandReader;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->brandProductRepositoryMock = $this->getMockBuilder(BrandProductRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCollectionTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\BrandCollectionTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\ProductAbstractTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdProductAbstract', 'getIdProductAbstract', 'setBrandCollection'])
            ->getMock();

        $this->brandProductAbstractRelationTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\BrandProductAbstractRelationTransfer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandTransferMock = $this->getMockBuilder('\Generated\Shared\Transfer\BrandTransfer')
            ->disableOriginalConstructor()
            ->setMethods(['requireIdBrand', 'getIdBrand'])
            ->getMock();

        $this->brandReader = new BrandReader($this->brandProductRepositoryMock);
    }

    /**
     * @return void
     */
    public function testGetBrandCollectionByIdProductAbstractId(): void
    {
        $this->productAbstractTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductAbstract');

        $this->productAbstractTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->brandProductRepositoryMock->expects($this->atLeastOnce())
            ->method('getBrandCollectionByAbstractIdProduct')
            ->with(1)
            ->willReturn($this->brandCollectionTransferMock);

        $brandCollectionTransfer = $this->brandReader->getBrandCollectionByIdProductAbstractId($this->productAbstractTransferMock);

        $this->assertEquals($this->brandCollectionTransferMock, $brandCollectionTransfer);
    }

    /**
     * @return void
     */
    public function testGetFirstBrandByProductAbstractId(): void
    {
        $this->productAbstractTransferMock->expects($this->atLeastOnce())
            ->method('requireIdProductAbstract');

        $this->productAbstractTransferMock->expects($this->atLeastOnce())
            ->method('getIdProductAbstract')
            ->willReturn(1);

        $this->brandProductRepositoryMock->expects($this->atLeastOnce())
            ->method('getFirstBrandByProductAbstractId')
            ->with(1)
            ->willReturn($this->brandTransferMock);

        $brandCollectionTransfer = $this->brandReader->getFirstBrandByProductAbstractId($this->productAbstractTransferMock);

        $this->assertEquals($this->brandTransferMock, $brandCollectionTransfer);
    }

    /**
     * @return void
     */
    public function testGetProductAbstractCollectionByBrand(): void
    {
        $this->brandTransferMock
            ->method('getIdBrand')
            ->willReturn(1);

        $this->brandProductRepositoryMock->expects($this->atLeastOnce())
            ->method('getProductAbstractCollectionByBrandId')
            ->willReturn($this->brandProductAbstractRelationTransferMock);

        $brandProductAbstractRelationTransfer = $this->brandReader->getProductAbstractCollectionByBrand($this->brandTransferMock);

        $this->assertEquals($this->brandProductAbstractRelationTransferMock, $brandProductAbstractRelationTransfer);
    }
}

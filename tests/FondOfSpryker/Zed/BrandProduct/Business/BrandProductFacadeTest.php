<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpanderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriterInterface;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandResponseTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface
     */
    protected $brandProductAbstractRelationReaderMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationWriterInterface
     */
    protected $brandProductAbstractRelationWriterMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\BrandProduct\Business\Expander\BrandExpanderInterface
     */
    protected $brandExpanderMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandCollectionTransfer
     */
    protected $brandCollectionTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected $productAbstractTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandTransfer
     */
    protected $brandTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\BrandResponseTransfer
     */
    protected $brandResponseTransferMock;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductFacadeInterface
     */
    protected $brandProductFacade;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->brandProductBusinessFactoryMock = $this->getMockBuilder(BrandProductBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductAbstractRelationReaderMock = $this->getMockBuilder(BrandProductAbstractRelationReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductAbstractRelationWriterMock = $this->getMockBuilder(BrandProductAbstractRelationWriterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandExpanderMock = $this->getMockBuilder(BrandExpanderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandCollectionTransferMock = $this->getMockBuilder(BrandCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productAbstractTransferMock = $this->getMockBuilder(ProductAbstractTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandResponseTransferMock = $this->getMockBuilder(BrandResponseTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductFacade = new BrandProductFacade();
        $this->brandProductFacade->setFactory($this->brandProductBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testGetBrandsByProductAbstractId(): void
    {
        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandProductAbstractRelationReader')
            ->willReturn($this->brandProductAbstractRelationReaderMock);

        $this->brandProductAbstractRelationReaderMock->expects($this->atLeastOnce())
            ->method('getBrandCollectionByIdProductAbstractId')
            ->willReturn($this->brandCollectionTransferMock);

        $brandCollectionTransfer = $this->brandProductFacade->getBrandsByProductAbstractId(1);

        $this->assertEquals($this->brandCollectionTransferMock, $brandCollectionTransfer);
    }

    /**
     * @return void
     */
    public function testSaveProductAbstractBrand(): void
    {
        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandProductAbstractRelationWriter')
            ->willReturn($this->brandProductAbstractRelationWriterMock);

        $this->brandProductAbstractRelationWriterMock->expects($this->atLeastOnce())
            ->method('saveProductAbstractBrand')
            ->with($this->productAbstractTransferMock)
            ->willReturn($this->productAbstractTransferMock);

        $productAbstractTransfer = $this->brandProductFacade->saveProductAbstractBrand(
            $this->productAbstractTransferMock,
        );

        $this->assertEquals($this->productAbstractTransferMock, $productAbstractTransfer);
    }

    /**
     * @return void
     */
    public function testExpandBrandTransferWithProductAbstractRelation(): void
    {
        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandExpander')
            ->willReturn($this->brandExpanderMock);

        $this->brandExpanderMock->expects($this->atLeastOnce())
            ->method('expandBrandTransferWithProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->brandProductFacade->expandBrandTransferWithProductAbstractRelation(
            $this->brandTransferMock,
        );

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }

    /**
     * @return void
     */
    public function testSaveBrandProductAbstractRelation(): void
    {
        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandProductAbstractRelationWriter')
            ->willReturn($this->brandProductAbstractRelationWriterMock);

        $this->brandProductAbstractRelationWriterMock->expects($this->atLeastOnce())
            ->method('saveBrandProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandTransferMock);

        $brandTransfer = $this->brandProductFacade->saveBrandProductAbstractRelation(
            $this->brandTransferMock,
        );

        $this->assertEquals($this->brandTransferMock, $brandTransfer);
    }

    /**
     * @return void
     */
    public function testDeleteBrandProductAbstractRelation(): void
    {
        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandProductAbstractRelationWriter')
            ->willReturn($this->brandProductAbstractRelationWriterMock);

        $this->brandProductAbstractRelationWriterMock->expects($this->atLeastOnce())
            ->method('deleteBrandProductAbstractRelation')
            ->with($this->brandTransferMock)
            ->willReturn($this->brandResponseTransferMock);

        $brandResponseTransfer = $this->brandProductFacade->deleteBrandProductAbstractRelation(
            $this->brandTransferMock,
        );

        $this->assertEquals($this->brandResponseTransferMock, $brandResponseTransfer);
    }
}

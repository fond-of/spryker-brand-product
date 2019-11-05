<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandExpander;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandReader;
use FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductWriter;
use FondOfSpryker\Zed\BrandProduct\Business\Model\ProductExpander;
use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;

class BrandProductFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductBusinessFactoryMock;

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

        $this->brandProductFacade = new BrandProductFacade();
        $this->brandProductFacade->setFactory($this->brandProductBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testExpandBrandTransferWithProductAbstractRelations(): void
    {
        $brandTransferMock = $this->getMockBuilder(BrandTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $brandExpanderMock = $this->getMockBuilder(BrandExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandExpander')
            ->willReturn($brandExpanderMock);

        $brandExpanderMock->expects($this->atLeastOnce())
            ->method('expandBrandTransferWithProductAbstractRelations')
            ->willReturn($brandTransferMock);

        $actualProductAbstractTransfer = $this->brandProductFacade->expandBrandTransferWithProductAbstractRelations($brandTransferMock);

        $this->assertEquals($brandTransferMock, $actualProductAbstractTransfer);
    }

    /**
     * @return void
     */
    public function testExpandProductAbstractTransferWithBrand(): void
    {
        $productAbstractTransferMock = $this->getMockBuilder(ProductAbstractTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $productExpanderMock = $this->getMockBuilder(ProductExpander::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createProductExpander')
            ->willReturn($productExpanderMock);

        $productExpanderMock->expects($this->atLeastOnce())
            ->method('expandProductAbstractTransferWithBrand')
            ->willReturn($productAbstractTransferMock);

        $actualProductAbstractTransfer = $this->brandProductFacade->expandProductAbstractTransferWithBrand($productAbstractTransferMock);

        $this->assertEquals($productAbstractTransferMock, $actualProductAbstractTransfer);
    }

    /**
     * @return void
     */
    public function testGetBrandsByProductAbstractId()
    {
        $brandCollectionTransferMock = $this->getMockBuilder(BrandCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $readerMock = $this->getMockBuilder(BrandReader::class)
            ->disableOriginalConstructor()
            ->getMock();

        $readerMock->expects($this->atLeastOnce())
            ->method('getBrandCollectionByIdProductAbstractId')
            ->willReturn($brandCollectionTransferMock);

        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandReader')
            ->willReturn($readerMock);

        $actualBrandCollectionTransfer = $this->brandProductFacade->getBrandsByProductAbstractId(1);

        $this->assertEquals($brandCollectionTransferMock, $actualBrandCollectionTransfer);
    }

    /**
     * @return void
     */
    public function testUpdateProductAbstractBrands()
    {
        $productAbstractTransferMock = $this->getMockBuilder(ProductAbstractTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $writerMock = $this->getMockBuilder(BrandProductWriter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $writerMock->expects($this->atLeastOnce())
            ->method('updateProductAbstractBrands')
            ->willReturn($productAbstractTransferMock);

        $this->brandProductBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createBrandWriter')
            ->willReturn($writerMock);

        $actualProductAbstractTransfer = $this->brandProductFacade->updateProductAbstractBrands($productAbstractTransferMock);

        $this->assertEquals($productAbstractTransferMock, $actualProductAbstractTransfer);
    }
}

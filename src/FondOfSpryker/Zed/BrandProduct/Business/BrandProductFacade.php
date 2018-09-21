<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory getFactory()
 */
class BrandProductFacade extends AbstractFacade implements BrandProductFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function expandProductAbstractTransferWithBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->getFactory()
            ->createProductExpander()
            ->expandProductAbstractTransferWithBrand($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelations(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFactory()
            ->createBrandExpander()
            ->expandBrandTransferWithProductAbstractRelations($brandTransfer);
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandsByProductAbstractId(int $idProductAbstract): BrandCollectionTransfer
    {
        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer->setIdProductAbstract($idProductAbstract);

        return $this->getFactory()
            ->createBrandReader()
            ->getBrandCollectionByIdProductAbstractId($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function createProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->getFactory()
            ->createBrandWriter()
            ->createProductAbstractBrands($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function updateProductAbstractBrands(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->getFactory()
            ->createBrandWriter()
            ->updateProductAbstractBrands($productAbstractTransfer);
    }
}

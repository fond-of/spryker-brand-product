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
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        return $this->getFactory()
            ->createBrandProductWriter()
            ->saveProductAbstractBrand($productAbstractTransfer);
    }
}

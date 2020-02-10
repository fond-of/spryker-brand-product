<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\BrandProduct\Business\BrandProductBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductRepositoryInterface getRepository()
 */
class BrandProductFacade extends AbstractFacade implements BrandProductFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer
     */
    public function getBrandsByProductAbstractId(int $idProductAbstract): BrandCollectionTransfer
    {
        $productAbstractTransfer = (new ProductAbstractTransfer())
            ->setIdProductAbstract($idProductAbstract);

        return $this->getFactory()
            ->createBrandReader()
            ->getBrandCollectionByIdProductAbstractId($productAbstractTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
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

<?php

namespace FondOfSpryker\Zed\BrandProduct\Business;

use Generated\Shared\Transfer\BrandCollectionTransfer;
use Generated\Shared\Transfer\BrandResponseTransfer;
use Generated\Shared\Transfer\BrandTransfer;
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
     * {@inheritDoc}
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
            ->createBrandProductAbstractRelationReader()
            ->getBrandCollectionByIdProductAbstractId($productAbstractTransfer);
    }

    /**
     * {@inheritDoc}
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
            ->createBrandProductAbstractRelationWriter()
            ->saveProductAbstractBrand($productAbstractTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function expandBrandTransferWithProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFactory()
            ->createBrandExpander()
            ->expandBrandTransferWithProductAbstractRelation($brandTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function saveBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getFactory()->createBrandProductAbstractRelationWriter()
            ->saveBrandProductAbstractRelation($brandTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandResponseTransfer
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandResponseTransfer
    {
        return $this->getFactory()->createBrandProductAbstractRelationWriter()
            ->deleteBrandProductAbstractRelation($brandTransfer);
    }
}

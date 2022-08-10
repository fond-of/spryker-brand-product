<?php

namespace FondOfSpryker\Zed\BrandProduct\Business\Model;

use FondOfSpryker\Zed\BrandProduct\BrandProductConfig;
use FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface;
use FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface;
use Generated\Shared\Transfer\BrandProductAbstractRelationTransfer;
use Generated\Shared\Transfer\BrandProductTransfer;
use Generated\Shared\Transfer\BrandResponseTransfer;
use Generated\Shared\Transfer\BrandTransfer;
use Generated\Shared\Transfer\MessageTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Spryker\Zed\Kernel\Persistence\EntityManager\TransactionTrait;

class BrandProductAbstractRelationWriter implements BrandProductAbstractRelationWriterInterface
{
    use TransactionTrait;

    /**
     * @var string
     */
    protected const MESSAGE_BRAND_PRODUCT_DELETE_SUCCESS = 'Brand Product Relation has been successfully removed.';

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface
     */
    protected $brandProductEntityManager;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface
     */
    protected $brandFacade;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface
     */
    protected $brandProductAbstractRelationReader;

    /**
     * @var \FondOfSpryker\Zed\BrandProduct\BrandProductConfig
     */
    protected $config;

    /**
     * @param \FondOfSpryker\Zed\BrandProduct\Persistence\BrandProductEntityManagerInterface $brandProductEntityManager
     * @param \FondOfSpryker\Zed\BrandProduct\Dependency\Facade\BrandProductToBrandFacadeInterface $brandFacade
     * @param \FondOfSpryker\Zed\BrandProduct\Business\Model\BrandProductAbstractRelationReaderInterface $brandProductAbstractRelationReader
     * @param \FondOfSpryker\Zed\BrandProduct\BrandProductConfig $config
     */
    public function __construct(
        BrandProductEntityManagerInterface $brandProductEntityManager,
        BrandProductToBrandFacadeInterface $brandFacade,
        BrandProductAbstractRelationReaderInterface $brandProductAbstractRelationReader,
        BrandProductConfig $config
    ) {
        $this->brandProductEntityManager = $brandProductEntityManager;
        $this->brandFacade = $brandFacade;
        $this->brandProductAbstractRelationReader = $brandProductAbstractRelationReader;
        $this->config = $config;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function saveProductAbstractBrand(ProductAbstractTransfer $productAbstractTransfer): ProductAbstractTransfer
    {
        $attributes = $productAbstractTransfer->getAttributes();

        if (!array_key_exists($this->config->getBrandProductAttribute(), $attributes)) {
            return $productAbstractTransfer;
        }

        $brandTransfer = $this->getBrandIdByBrandName($attributes[$this->config->getBrandProductAttribute()]);

        if ($brandTransfer === null) {
            return $productAbstractTransfer;
        }

        $brandProductTransfer = (new BrandProductTransfer())
            ->setFkBrand($brandTransfer->getIdBrand())
            ->setFkProductAbstract($productAbstractTransfer->getIdProductAbstract());

        $this->brandProductEntityManager->saveBrandProduct($brandProductTransfer);

        return $productAbstractTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function saveBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandTransfer
    {
        return $this->getTransactionHandler()->handleTransaction(function () use ($brandTransfer) {
            return $this->executeSaveBrandProductAbstractRelationTransaction($brandTransfer);
        });
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    protected function executeSaveBrandProductAbstractRelationTransaction(BrandTransfer $brandTransfer): BrandTransfer
    {
        $brandTransfer->requireIdBrand();
        $idBrand = $brandTransfer->getIdBrand();
        $brandProductAbstractRelationTransfer = $brandTransfer->getBrandProductAbstractRelation();

        if ($brandProductAbstractRelationTransfer->getIdBrand() === null) {
            $brandProductAbstractRelationTransfer->setIdBrand($idBrand);
        }

        $requestedProductAbstractIds = $this->getRequestedProductAbstractIds($brandProductAbstractRelationTransfer);
        $currentProductAbstractIds = $this->getRelatedProductAbstractIds($brandProductAbstractRelationTransfer);

        $saveProductAbstractIds = array_diff($requestedProductAbstractIds, $currentProductAbstractIds);
        $deleteProductAbstractIds = array_diff($currentProductAbstractIds, $requestedProductAbstractIds);

        $this->brandProductEntityManager->addProductAbstractRelations($idBrand, $saveProductAbstractIds);
        $this->brandProductEntityManager->removeProductAbstractRelations($idBrand, $deleteProductAbstractIds);

        $brandProductAbstractRelationTransfer->setProductAbstractIds(
            $this->getRelatedProductAbstractIds($brandProductAbstractRelationTransfer),
        );

        return $brandTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandResponseTransfer
     */
    public function deleteBrandProductAbstractRelation(BrandTransfer $brandTransfer): BrandResponseTransfer
    {
        $brandResponseTransfer = (new BrandResponseTransfer())
            ->setBrand($brandTransfer)
            ->setIsSuccessful(true);

        return $this->getTransactionHandler()->handleTransaction(function () use ($brandTransfer, $brandResponseTransfer) {
            return $this->executeDeleteBrandProductAbstractRelationTransaction($brandTransfer, $brandResponseTransfer);
        });
    }

    /**
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     * @param \Generated\Shared\Transfer\BrandResponseTransfer $brandResponseTransfer
     *
     * @return \Generated\Shared\Transfer\BrandResponseTransfer
     */
    protected function executeDeleteBrandProductAbstractRelationTransaction(
        BrandTransfer $brandTransfer,
        BrandResponseTransfer $brandResponseTransfer
    ): BrandResponseTransfer {
        $this->brandProductEntityManager->deleteBrandProductAbstractRelation($brandTransfer);

        $brandResponseTransfer->addMessage(
            (new MessageTransfer())->setValue(static::MESSAGE_BRAND_PRODUCT_DELETE_SUCCESS),
        );

        return $brandResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return array
     */
    protected function getRelatedProductAbstractIds(
        BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
    ): array {
        $currentBrandProductAbstractRelationTransfer = $this->brandProductAbstractRelationReader
            ->getBrandProductAbstractRelation($brandProductAbstractRelationTransfer);

        if (!$currentBrandProductAbstractRelationTransfer->getProductAbstractIds()) {
            return [];
        }

        return $currentBrandProductAbstractRelationTransfer->getProductAbstractIds();
    }

    /**
     * @param \Generated\Shared\Transfer\BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
     *
     * @return array
     */
    protected function getRequestedProductAbstractIds(
        BrandProductAbstractRelationTransfer $brandProductAbstractRelationTransfer
    ): array {
        if (!$brandProductAbstractRelationTransfer->getProductAbstractIds()) {
            return [];
        }

        return $brandProductAbstractRelationTransfer->getProductAbstractIds();
    }

    /**
     * @param string $name
     *
     * @return \Generated\Shared\Transfer\BrandTransfer|null
     */
    protected function getBrandIdByBrandName(string $name): ?BrandTransfer
    {
        $brandTransfer = (new BrandTransfer())
            ->setName($name);

        return $this->brandFacade->findBrandByName($brandTransfer);
    }
}

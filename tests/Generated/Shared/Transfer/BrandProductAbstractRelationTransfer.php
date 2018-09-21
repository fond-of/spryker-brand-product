<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class BrandProductAbstractRelationTransfer extends AbstractTransfer
{
    public const ID_BRAND = 'idBrand';

    public const PRODUCT_ABSTRACT_IDS = 'productAbstractIds';

    /**
     * @var int|null
     */
    protected $idBrand;

    /**
     * @var int[]
     */
    protected $productAbstractIds = [];

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'id_brand' => 'idBrand',
        'idBrand' => 'idBrand',
        'IdBrand' => 'idBrand',
        'product_abstract_ids' => 'productAbstractIds',
        'productAbstractIds' => 'productAbstractIds',
        'ProductAbstractIds' => 'productAbstractIds',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::ID_BRAND => [
            'type' => 'int',
            'name_underscore' => 'id_brand',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::PRODUCT_ABSTRACT_IDS => [
            'type' => 'int[]',
            'name_underscore' => 'product_abstract_ids',
            'is_collection' => false,
            'is_transfer' => false,
        ],
    ];

    /**
     * @module BrandProduct
     *
     * @param int|null $idBrand
     *
     * @return $this
     */
    public function setIdBrand($idBrand)
    {
        $this->idBrand = $idBrand;
        $this->modifiedProperties[self::ID_BRAND] = true;

        return $this;
    }

    /**
     * @module BrandProduct
     *
     * @return int|null
     */
    public function getIdBrand()
    {
        return $this->idBrand;
    }

    /**
     * @module BrandProduct
     *
     * @return $this
     */
    public function requireIdBrand()
    {
        $this->assertPropertyIsSet(self::ID_BRAND);

        return $this;
    }

    /**
     * @module BrandProduct
     *
     * @param int[]|null $productAbstractIds
     *
     * @return $this
     */
    public function setProductAbstractIds(array $productAbstractIds = null)
    {
        if ($productAbstractIds === null) {
            $productAbstractIds = [];
        }

        $this->productAbstractIds = $productAbstractIds;
        $this->modifiedProperties[self::PRODUCT_ABSTRACT_IDS] = true;

        return $this;
    }

    /**
     * @module BrandProduct
     *
     * @return int[]
     */
    public function getProductAbstractIds()
    {
        return $this->productAbstractIds;
    }

    /**
     * @module BrandProduct
     *
     * @param int $productAbstractIds
     *
     * @return $this
     */
    public function addProductAbstractIds($productAbstractIds)
    {
        $this->productAbstractIds[] = $productAbstractIds;
        $this->modifiedProperties[self::PRODUCT_ABSTRACT_IDS] = true;

        return $this;
    }

    /**
     * @module BrandProduct
     *
     * @return $this
     */
    public function requireProductAbstractIds()
    {
        $this->assertPropertyIsSet(self::PRODUCT_ABSTRACT_IDS);

        return $this;
    }
}

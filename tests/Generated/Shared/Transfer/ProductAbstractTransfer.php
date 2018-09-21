<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Generated\Shared\Transfer;

use ArrayObject;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;

/**
 * !!! THIS FILE IS AUTO-GENERATED, EVERY CHANGE WILL BE LOST WITH THE NEXT RUN OF TRANSFER GENERATOR
 * !!! DO NOT CHANGE ANYTHING IN THIS FILE
 */
class ProductAbstractTransfer extends AbstractTransfer
{
    public const BRAND_COLLECTION = 'brandCollection';

    public const PRODUCT_CONCRETES = 'productConcretes';

    public const PRICES = 'prices';

    public const NEW_FROM = 'newFrom';

    public const NEW_TO = 'newTo';

    public const IMAGE_SETS = 'imageSets';

    public const STORE_RELATION = 'storeRelation';

    public const ID_PRODUCT_ABSTRACT = 'idProductAbstract';

    public const SKU = 'sku';

    public const ATTRIBUTES = 'attributes';

    public const LOCALIZED_ATTRIBUTES = 'localizedAttributes';

    public const IS_ACTIVE = 'isActive';

    public const ID_TAX_SET = 'idTaxSet';

    /**
     * @var \Generated\Shared\Transfer\BrandCollectionTransfer|null
     */
    protected $brandCollection;

    /**
     * @var array
     */
    protected $productConcretes = [];

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\PriceProductTransfer[]
     */
    protected $prices;

    /**
     * @var string|null
     */
    protected $newFrom;

    /**
     * @var string|null
     */
    protected $newTo;

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\ProductImageSetTransfer[]
     */
    protected $imageSets;

    /**
     * @var \Generated\Shared\Transfer\StoreRelationTransfer|null
     */
    protected $storeRelation;

    /**
     * @var int|null
     */
    protected $idProductAbstract;

    /**
     * @var string|null
     */
    protected $sku;

    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @var \ArrayObject|\Generated\Shared\Transfer\LocalizedAttributesTransfer[]
     */
    protected $localizedAttributes;

    /**
     * @var bool|null
     */
    protected $isActive;

    /**
     * @var int|null
     */
    protected $idTaxSet;

    /**
     * @var array
     */
    protected $transferPropertyNameMap = [
        'brand_collection' => 'brandCollection',
        'brandCollection' => 'brandCollection',
        'BrandCollection' => 'brandCollection',
        'product_concretes' => 'productConcretes',
        'productConcretes' => 'productConcretes',
        'ProductConcretes' => 'productConcretes',
        'prices' => 'prices',
        'Prices' => 'prices',
        'new_from' => 'newFrom',
        'newFrom' => 'newFrom',
        'NewFrom' => 'newFrom',
        'new_to' => 'newTo',
        'newTo' => 'newTo',
        'NewTo' => 'newTo',
        'image_sets' => 'imageSets',
        'imageSets' => 'imageSets',
        'ImageSets' => 'imageSets',
        'store_relation' => 'storeRelation',
        'storeRelation' => 'storeRelation',
        'StoreRelation' => 'storeRelation',
        'id_product_abstract' => 'idProductAbstract',
        'idProductAbstract' => 'idProductAbstract',
        'IdProductAbstract' => 'idProductAbstract',
        'sku' => 'sku',
        'Sku' => 'sku',
        'attributes' => 'attributes',
        'Attributes' => 'attributes',
        'localized_attributes' => 'localizedAttributes',
        'localizedAttributes' => 'localizedAttributes',
        'LocalizedAttributes' => 'localizedAttributes',
        'is_active' => 'isActive',
        'isActive' => 'isActive',
        'IsActive' => 'isActive',
        'id_tax_set' => 'idTaxSet',
        'idTaxSet' => 'idTaxSet',
        'IdTaxSet' => 'idTaxSet',
    ];

    /**
     * @var array
     */
    protected $transferMetadata = [
        self::BRAND_COLLECTION => [
            'type' => 'Generated\Shared\Transfer\BrandCollectionTransfer',
            'name_underscore' => 'brand_collection',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::PRODUCT_CONCRETES => [
            'type' => 'array',
            'name_underscore' => 'product_concretes',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::PRICES => [
            'type' => 'Generated\Shared\Transfer\PriceProductTransfer',
            'name_underscore' => 'prices',
            'is_collection' => true,
            'is_transfer' => true,
        ],
        self::NEW_FROM => [
            'type' => 'string',
            'name_underscore' => 'new_from',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::NEW_TO => [
            'type' => 'string',
            'name_underscore' => 'new_to',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::IMAGE_SETS => [
            'type' => 'Generated\Shared\Transfer\ProductImageSetTransfer',
            'name_underscore' => 'image_sets',
            'is_collection' => true,
            'is_transfer' => true,
        ],
        self::STORE_RELATION => [
            'type' => 'Generated\Shared\Transfer\StoreRelationTransfer',
            'name_underscore' => 'store_relation',
            'is_collection' => false,
            'is_transfer' => true,
        ],
        self::ID_PRODUCT_ABSTRACT => [
            'type' => 'int',
            'name_underscore' => 'id_product_abstract',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::SKU => [
            'type' => 'string',
            'name_underscore' => 'sku',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::ATTRIBUTES => [
            'type' => 'array',
            'name_underscore' => 'attributes',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::LOCALIZED_ATTRIBUTES => [
            'type' => 'Generated\Shared\Transfer\LocalizedAttributesTransfer',
            'name_underscore' => 'localized_attributes',
            'is_collection' => true,
            'is_transfer' => true,
        ],
        self::IS_ACTIVE => [
            'type' => 'bool',
            'name_underscore' => 'is_active',
            'is_collection' => false,
            'is_transfer' => false,
        ],
        self::ID_TAX_SET => [
            'type' => 'int',
            'name_underscore' => 'id_tax_set',
            'is_collection' => false,
            'is_transfer' => false,
        ],
    ];

    /**
     * @module BrandProduct
     *
     * @param \Generated\Shared\Transfer\BrandCollectionTransfer|null $brandCollection
     *
     * @return $this
     */
    public function setBrandCollection(BrandCollectionTransfer $brandCollection = null)
    {
        $this->brandCollection = $brandCollection;
        $this->modifiedProperties[self::BRAND_COLLECTION] = true;

        return $this;
    }

    /**
     * @module BrandProduct
     *
     * @return \Generated\Shared\Transfer\BrandCollectionTransfer|null
     */
    public function getBrandCollection()
    {
        return $this->brandCollection;
    }

    /**
     * @module BrandProduct
     *
     * @return $this
     */
    public function requireBrandCollection()
    {
        $this->assertPropertyIsSet(self::BRAND_COLLECTION);

        return $this;
    }

    /**
     * @module ProductApi
     *
     * @param array|null $productConcretes
     *
     * @return $this
     */
    public function setProductConcretes(array $productConcretes = null)
    {
        if ($productConcretes === null) {
            $productConcretes = [];
        }

        $this->productConcretes = $productConcretes;
        $this->modifiedProperties[self::PRODUCT_CONCRETES] = true;

        return $this;
    }

    /**
     * @module ProductApi
     *
     * @return array
     */
    public function getProductConcretes()
    {
        return $this->productConcretes;
    }

    /**
     * @module ProductApi
     *
     * @param mixed $productConcretes
     *
     * @return $this
     */
    public function addProductConcretes($productConcretes)
    {
        $this->productConcretes[] = $productConcretes;
        $this->modifiedProperties[self::PRODUCT_CONCRETES] = true;

        return $this;
    }

    /**
     * @module ProductApi
     *
     * @return $this
     */
    public function requireProductConcretes()
    {
        $this->assertPropertyIsSet(self::PRODUCT_CONCRETES);

        return $this;
    }

    /**
     * @module PriceProduct
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\PriceProductTransfer[] $prices
     *
     * @return $this
     */
    public function setPrices(ArrayObject $prices)
    {
        $this->prices = $prices;
        $this->modifiedProperties[self::PRICES] = true;

        return $this;
    }

    /**
     * @module PriceProduct
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\PriceProductTransfer[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @module PriceProduct
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $price
     *
     * @return $this
     */
    public function addPrice(PriceProductTransfer $price)
    {
        $this->prices[] = $price;
        $this->modifiedProperties[self::PRICES] = true;

        return $this;
    }

    /**
     * @module PriceProduct
     *
     * @return $this
     */
    public function requirePrices()
    {
        $this->assertCollectionPropertyIsSet(self::PRICES);

        return $this;
    }

    /**
     * @module ProductAttribute
     *
     * @param string|null $newFrom
     *
     * @return $this
     */
    public function setNewFrom($newFrom)
    {
        $this->newFrom = $newFrom;
        $this->modifiedProperties[self::NEW_FROM] = true;

        return $this;
    }

    /**
     * @module ProductAttribute
     *
     * @return string|null
     */
    public function getNewFrom()
    {
        return $this->newFrom;
    }

    /**
     * @module ProductAttribute
     *
     * @return $this
     */
    public function requireNewFrom()
    {
        $this->assertPropertyIsSet(self::NEW_FROM);

        return $this;
    }

    /**
     * @module ProductAttribute
     *
     * @param string|null $newTo
     *
     * @return $this
     */
    public function setNewTo($newTo)
    {
        $this->newTo = $newTo;
        $this->modifiedProperties[self::NEW_TO] = true;

        return $this;
    }

    /**
     * @module ProductAttribute
     *
     * @return string|null
     */
    public function getNewTo()
    {
        return $this->newTo;
    }

    /**
     * @module ProductAttribute
     *
     * @return $this
     */
    public function requireNewTo()
    {
        $this->assertPropertyIsSet(self::NEW_TO);

        return $this;
    }

    /**
     * @module ProductImage
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\ProductImageSetTransfer[] $imageSets
     *
     * @return $this
     */
    public function setImageSets(ArrayObject $imageSets)
    {
        $this->imageSets = $imageSets;
        $this->modifiedProperties[self::IMAGE_SETS] = true;

        return $this;
    }

    /**
     * @module ProductImage
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\ProductImageSetTransfer[]
     */
    public function getImageSets()
    {
        return $this->imageSets;
    }

    /**
     * @module ProductImage
     *
     * @param \Generated\Shared\Transfer\ProductImageSetTransfer $imageSet
     *
     * @return $this
     */
    public function addImageSet(ProductImageSetTransfer $imageSet)
    {
        $this->imageSets[] = $imageSet;
        $this->modifiedProperties[self::IMAGE_SETS] = true;

        return $this;
    }

    /**
     * @module ProductImage
     *
     * @return $this
     */
    public function requireImageSets()
    {
        $this->assertCollectionPropertyIsSet(self::IMAGE_SETS);

        return $this;
    }

    /**
     * @module ProductManagement|Product
     *
     * @param \Generated\Shared\Transfer\StoreRelationTransfer|null $storeRelation
     *
     * @return $this
     */
    public function setStoreRelation(StoreRelationTransfer $storeRelation = null)
    {
        $this->storeRelation = $storeRelation;
        $this->modifiedProperties[self::STORE_RELATION] = true;

        return $this;
    }

    /**
     * @module ProductManagement|Product
     *
     * @return \Generated\Shared\Transfer\StoreRelationTransfer|null
     */
    public function getStoreRelation()
    {
        return $this->storeRelation;
    }

    /**
     * @module ProductManagement|Product
     *
     * @return $this
     */
    public function requireStoreRelation()
    {
        $this->assertPropertyIsSet(self::STORE_RELATION);

        return $this;
    }

    /**
     * @module Product
     *
     * @param int|null $idProductAbstract
     *
     * @return $this
     */
    public function setIdProductAbstract($idProductAbstract)
    {
        $this->idProductAbstract = $idProductAbstract;
        $this->modifiedProperties[self::ID_PRODUCT_ABSTRACT] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return int|null
     */
    public function getIdProductAbstract()
    {
        return $this->idProductAbstract;
    }

    /**
     * @module Product
     *
     * @return $this
     */
    public function requireIdProductAbstract()
    {
        $this->assertPropertyIsSet(self::ID_PRODUCT_ABSTRACT);

        return $this;
    }

    /**
     * @module Product
     *
     * @param string|null $sku
     *
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        $this->modifiedProperties[self::SKU] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return string|null
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @module Product
     *
     * @return $this
     */
    public function requireSku()
    {
        $this->assertPropertyIsSet(self::SKU);

        return $this;
    }

    /**
     * @module Product
     *
     * @param array|null $attributes
     *
     * @return $this
     */
    public function setAttributes(array $attributes = null)
    {
        if ($attributes === null) {
            $attributes = [];
        }

        $this->attributes = $attributes;
        $this->modifiedProperties[self::ATTRIBUTES] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @module Product
     *
     * @param mixed $attribute
     *
     * @return $this
     */
    public function addAttribute($attribute)
    {
        $this->attributes[] = $attribute;
        $this->modifiedProperties[self::ATTRIBUTES] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return $this
     */
    public function requireAttributes()
    {
        $this->assertPropertyIsSet(self::ATTRIBUTES);

        return $this;
    }

    /**
     * @module Product
     *
     * @param \ArrayObject|\Generated\Shared\Transfer\LocalizedAttributesTransfer[] $localizedAttributes
     *
     * @return $this
     */
    public function setLocalizedAttributes(ArrayObject $localizedAttributes)
    {
        $this->localizedAttributes = $localizedAttributes;
        $this->modifiedProperties[self::LOCALIZED_ATTRIBUTES] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return \ArrayObject|\Generated\Shared\Transfer\LocalizedAttributesTransfer[]
     */
    public function getLocalizedAttributes()
    {
        return $this->localizedAttributes;
    }

    /**
     * @module Product
     *
     * @param \Generated\Shared\Transfer\LocalizedAttributesTransfer $localizedAttributes
     *
     * @return $this
     */
    public function addLocalizedAttributes(LocalizedAttributesTransfer $localizedAttributes)
    {
        $this->localizedAttributes[] = $localizedAttributes;
        $this->modifiedProperties[self::LOCALIZED_ATTRIBUTES] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return $this
     */
    public function requireLocalizedAttributes()
    {
        $this->assertCollectionPropertyIsSet(self::LOCALIZED_ATTRIBUTES);

        return $this;
    }

    /**
     * @module Product
     *
     * @param bool|null $isActive
     *
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        $this->modifiedProperties[self::IS_ACTIVE] = true;

        return $this;
    }

    /**
     * @module Product
     *
     * @return bool|null
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @module Product
     *
     * @return $this
     */
    public function requireIsActive()
    {
        $this->assertPropertyIsSet(self::IS_ACTIVE);

        return $this;
    }

    /**
     * @module TaxProductConnector
     *
     * @param int|null $idTaxSet
     *
     * @return $this
     */
    public function setIdTaxSet($idTaxSet)
    {
        $this->idTaxSet = $idTaxSet;
        $this->modifiedProperties[self::ID_TAX_SET] = true;

        return $this;
    }

    /**
     * @module TaxProductConnector
     *
     * @return int|null
     */
    public function getIdTaxSet()
    {
        return $this->idTaxSet;
    }

    /**
     * @module TaxProductConnector
     *
     * @return $this
     */
    public function requireIdTaxSet()
    {
        $this->assertPropertyIsSet(self::ID_TAX_SET);

        return $this;
    }
}

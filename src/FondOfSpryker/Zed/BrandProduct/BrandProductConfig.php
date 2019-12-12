<?php

namespace FondOfSpryker\Zed\BrandProduct;

use FondOfSpryker\Shared\BrandProduct\BrandProductConstants;
use Spryker\Zed\Kernel\AbstractBundleConfig;

class BrandProductConfig extends AbstractBundleConfig
{
    /**
     * @return string
     */
    public function getBrandProductAttribute()
    {
        return $this->get(BrandProductConstants::PRODUCT_ATTRIBUTE_BRAND, 'brand');
    }
}

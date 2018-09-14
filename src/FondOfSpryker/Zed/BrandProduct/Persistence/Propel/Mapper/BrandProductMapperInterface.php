<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\BrandTransfer;
use Orm\Zed\Brand\Persistence\FosBrand;

interface BrandProductMapperInterface
{
    /**
     * @param \Orm\Zed\Brand\Persistence\FosBrand $fosBrand
     * @param \Generated\Shared\Transfer\BrandTransfer $brandTransfer
     *
     * @return \Generated\Shared\Transfer\BrandTransfer
     */
    public function mapBrand(FosBrand $fosBrand, BrandTransfer $brandTransfer): BrandTransfer;
}

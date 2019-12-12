<?php

namespace FondOfSpryker\Zed\BrandProduct\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\BrandProductTransfer;
use Orm\Zed\BrandProduct\Persistence\FosBrandProduct;

interface BrandProductMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\BrandProductTransfer $brandProductTransfer
     * @param \Orm\Zed\BrandProduct\Persistence\FosBrandProduct $fosBrandProduct
     *
     * @return \Orm\Zed\BrandProduct\Persistence\FosBrandProduct
     */
    public function mapTransferToEntity(
        BrandProductTransfer $brandProductTransfer,
        FosBrandProduct $fosBrandProduct
    ): FosBrandProduct;
}

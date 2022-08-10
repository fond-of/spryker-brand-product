<?php

namespace FondOfSpryker\Zed\BrandProduct;

use Codeception\Test\Unit;
use FondOfSpryker\Shared\BrandProduct\BrandProductConstants;

class BrandProductConfigTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\BrandProduct\BrandProductConfig|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $brandProductConfigConfig;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->brandProductConfigConfig = $this->getMockBuilder(BrandProductConfig::class)
        ->onlyMethods(['get'])
        ->getMock();
    }

    /**
     * @return void
     */
    public function testGetBrandProductAttribute(): void
    {
        $this->brandProductConfigConfig->expects($this->atLeastOnce())
        ->method('get')
        ->with(BrandProductConstants::PRODUCT_ATTRIBUTE_BRAND, 'brand')
        ->willReturn('brand');

        $this->assertEquals('brand', $this->brandProductConfigConfig->getBrandProductAttribute());
    }

    /**
     * @return void
     */
    public function testGetBrandProductAttributeWithCustomValue(): void
    {
        $this->brandProductConfigConfig->expects($this->atLeastOnce())
            ->method('get')
            ->with(BrandProductConstants::PRODUCT_ATTRIBUTE_BRAND, 'brand')
            ->willReturn('xxx');

        $this->assertEquals('xxx', $this->brandProductConfigConfig->getBrandProductAttribute());
    }
}

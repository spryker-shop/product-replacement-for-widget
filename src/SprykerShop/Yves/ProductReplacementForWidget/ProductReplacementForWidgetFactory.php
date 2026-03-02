<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductReplacementForWidget;

use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\ProductReplacementForWidget\Dependency\Client\ProductReplacementForWidgetToProductAlternativeStorageClientInterface;
use SprykerShop\Yves\ProductReplacementForWidget\Dependency\Client\ProductReplacementForWidgetToProductStorageClientInterface;

class ProductReplacementForWidgetFactory extends AbstractFactory
{
    public function getProductStorageClient(): ProductReplacementForWidgetToProductStorageClientInterface
    {
        return $this->getProvidedDependency(ProductReplacementForWidgetDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }

    public function getProductAlternativeStorageClient(): ProductReplacementForWidgetToProductAlternativeStorageClientInterface
    {
        return $this->getProvidedDependency(ProductReplacementForWidgetDependencyProvider::CLIENT_PRODUCT_ALTERNATIVE_STORAGE);
    }

    /**
     * @return array<string>
     */
    public function getProductDetailPageProductReplacementsForWidgetPlugins(): array
    {
        return $this->getProvidedDependency(ProductReplacementForWidgetDependencyProvider::PLUGIN_PRODUCT_DETAIL_PAGE_PRODUCT_REPLACEMENTS_FOR_WIDGETS);
    }
}

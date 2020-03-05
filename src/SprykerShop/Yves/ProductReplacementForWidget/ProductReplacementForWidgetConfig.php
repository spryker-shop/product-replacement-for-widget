<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductReplacementForWidget;

use Spryker\Yves\Kernel\AbstractBundleConfig;

class ProductReplacementForWidgetConfig extends AbstractBundleConfig
{
    /**
     * @see \Spryker\Shared\Product\ProductConfig::RESOURCE_TYPE_ATTRIBUTE_MAP
     */
    public const RESOURCE_TYPE_ATTRIBUTE_MAP = 'attribute_map';

    /**
     * @api
     *
     * @return bool
     */
    public function isProductReplacementFilterActive(): bool
    {
        return false;
    }
}

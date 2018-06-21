<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ProductReplacementForWidget\Plugin\ProductDetailPage;

use Generated\Shared\Transfer\ProductViewTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidgetPlugin;
use SprykerShop\Yves\ProductDetailPage\Dependency\Plugin\ProductReplacementForWidgetPlugin\ProductReplacementForWidgetPluginInterface;

/**
 * @method \SprykerShop\Yves\ProductReplacementForWidget\ProductReplacementForWidgetFactory getFactory()
 */
class ProductReplacementForWidgetPlugin extends AbstractWidgetPlugin implements ProductReplacementForWidgetPluginInterface
{
    /**
     * @param string $sku
     *
     * @return void
     */
    public function initialize(string $sku): void
    {
        $this->addParameter('products', $this->findReplacementForProducts($sku));
    }

    /**
     * Specification:
     * - Returns the name of the widget as it's used in templates.
     *
     * @api
     *
     * @return string
     */
    public static function getName()
    {
        return static::NAME;
    }

    /**
     * Specification:
     * - Returns the the template file path to render the widget.
     *
     * @api
     *
     * @return string
     */
    public static function getTemplate()
    {
        return '@ProductReplacementForWidget/views/product-replacement-for-list/product-replacement-for-list.twig';
    }

    /**
     * @param string $sku
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer[]
     */
    protected function findReplacementForProducts(string $sku): array
    {
        $productViewTransferList = [];
        $productReplacementForStorage = $this->getFactory()->getProductAlternativeStorageClient()
            ->findProductReplacementForStorage($sku);
        if (!$productReplacementForStorage) {
            return $productViewTransferList;
        }
        foreach ($productReplacementForStorage->getProductConcreteIds() as $idProduct) {
            $productViewTransferList[] = $this->getProductView($idProduct);
        }

        return array_filter($productViewTransferList);
    }

    /**
     * @param int $idProduct
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer|null
     */
    protected function getProductView(int $idProduct): ?ProductViewTransfer
    {
        $productStorageData = $this->getFactory()
            ->getProductStorageClient()
            ->getProductConcreteStorageData($idProduct, $this->getLocale());
        if (empty($productStorageData)) {
            return null;
        }

        return $this->getFactory()
            ->getProductStorageClient()
            ->mapProductStorageData($productStorageData, $this->getLocale());
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ProductConfigurationWishlistsRestApi\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Deleter\WishlistItemDeleter;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Deleter\WishlistItemDeleterInterface;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Reader\WishlistItemReader;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Reader\WishlistItemReaderInterface;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Updater\WishlistItemUpdater;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Business\Updater\WishlistItemUpdaterInterface;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Dependency\Facade\ProductConfigurationWishlistsRestApiToWishlistFacadeInterface;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\Dependency\Service\ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface;
use Spryker\Zed\ProductConfigurationWishlistsRestApi\ProductConfigurationWishlistsRestApiDependencyProvider;

/**
 * @method \Spryker\Zed\ProductConfigurationWishlistsRestApi\ProductConfigurationWishlistsRestApiConfig getConfig()
 */
class ProductConfigurationWishlistsRestApiBusinessFactory extends AbstractBusinessFactory
{
    public function createWishlistItemDeleter(): WishlistItemDeleterInterface
    {
        return new WishlistItemDeleter(
            $this->createWishlistItemReader(),
            $this->getWishlistFacade(),
        );
    }

    public function createWishlistItemReader(): WishlistItemReaderInterface
    {
        return new WishlistItemReader(
            $this->getProductConfigurationService(),
        );
    }

    public function createWishlistItemUpdater(): WishlistItemUpdaterInterface
    {
        return new WishlistItemUpdater(
            $this->createWishlistItemReader(),
            $this->getWishlistFacade(),
        );
    }

    public function getWishlistFacade(): ProductConfigurationWishlistsRestApiToWishlistFacadeInterface
    {
        return $this->getProvidedDependency(ProductConfigurationWishlistsRestApiDependencyProvider::FACADE_WISHLIST);
    }

    public function getProductConfigurationService(): ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface
    {
        return $this->getProvidedDependency(ProductConfigurationWishlistsRestApiDependencyProvider::SERVICE_PRODUCT_CONFIGURATION);
    }
}

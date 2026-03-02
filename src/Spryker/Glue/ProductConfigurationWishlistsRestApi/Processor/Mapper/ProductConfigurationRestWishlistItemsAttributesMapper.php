<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationWishlistsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use Generated\Shared\Transfer\RestWishlistItemProductConfigurationInstanceAttributesTransfer;
use Generated\Shared\Transfer\RestWishlistItemsAttributesTransfer;
use Generated\Shared\Transfer\WishlistItemRequestTransfer;
use Generated\Shared\Transfer\WishlistItemTransfer;
use Spryker\Glue\ProductConfigurationWishlistsRestApi\Dependency\Service\ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface;

class ProductConfigurationRestWishlistItemsAttributesMapper implements ProductConfigurationRestWishlistItemsAttributesMapperInterface
{
    /**
     * @var \Spryker\Glue\ProductConfigurationWishlistsRestApi\Processor\Mapper\ProductConfigurationInstanceMapperInterface
     */
    protected $productConfigurationInstanceMapper;

    /**
     * @var \Spryker\Glue\ProductConfigurationWishlistsRestApi\Dependency\Service\ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface
     */
    protected $productConfigurationService;

    public function __construct(
        ProductConfigurationInstanceMapperInterface $productConfigurationInstanceMapper,
        ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface $productConfigurationService
    ) {
        $this->productConfigurationInstanceMapper = $productConfigurationInstanceMapper;
        $this->productConfigurationService = $productConfigurationService;
    }

    public function mapRestWishlistItemsAttributesTransferToWishlistItemRequestTransfer(
        RestWishlistItemsAttributesTransfer $restWishlistItemsAttributesTransfer,
        WishlistItemRequestTransfer $wishlistItemRequestTransfer
    ): WishlistItemRequestTransfer {
        $productConfigurationInstance = $restWishlistItemsAttributesTransfer->getProductConfigurationInstance();

        if (!$productConfigurationInstance) {
            return $wishlistItemRequestTransfer;
        }

        $productConfigurationInstance = $this->productConfigurationInstanceMapper
            ->mapRestWishlistItemProductConfigurationInstanceAttributesToProductConfigurationInstance(
                $productConfigurationInstance,
                new ProductConfigurationInstanceTransfer(),
            );

        return $wishlistItemRequestTransfer->setProductConfigurationInstance($productConfigurationInstance);
    }

    public function mapWishlistItemTransferToRestWishlistItemsAttributesTransfer(
        WishlistItemTransfer $wishlistItemTransfer,
        RestWishlistItemsAttributesTransfer $restWishlistItemsAttributesTransfer
    ): RestWishlistItemsAttributesTransfer {
        $productConfigurationInstance = $wishlistItemTransfer->getProductConfigurationInstance();

        if (!$productConfigurationInstance) {
            return $restWishlistItemsAttributesTransfer;
        }

        $restWishlistItemsAttributesId = sprintf(
            '%s_%s',
            $wishlistItemTransfer->getSku(),
            $this->productConfigurationService->getProductConfigurationInstanceHash($productConfigurationInstance),
        );

        $restWishlistItemsAttributesTransfer->setId($restWishlistItemsAttributesId);

        $restWishlistItemsAttributesProductConfigurationTransfer = $this->productConfigurationInstanceMapper
            ->mapProductConfigurationInstanceToRestWishlistItemProductConfigurationInstanceAttributes(
                $productConfigurationInstance,
                new RestWishlistItemProductConfigurationInstanceAttributesTransfer(),
            );

        return $restWishlistItemsAttributesTransfer->setProductConfigurationInstance($restWishlistItemsAttributesProductConfigurationTransfer);
    }
}

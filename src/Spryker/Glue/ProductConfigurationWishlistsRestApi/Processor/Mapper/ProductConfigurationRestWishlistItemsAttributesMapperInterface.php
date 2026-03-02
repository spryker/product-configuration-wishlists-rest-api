<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationWishlistsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\RestWishlistItemsAttributesTransfer;
use Generated\Shared\Transfer\WishlistItemRequestTransfer;
use Generated\Shared\Transfer\WishlistItemTransfer;

interface ProductConfigurationRestWishlistItemsAttributesMapperInterface
{
    public function mapRestWishlistItemsAttributesTransferToWishlistItemRequestTransfer(
        RestWishlistItemsAttributesTransfer $restWishlistItemsAttributesTransfer,
        WishlistItemRequestTransfer $wishlistItemRequestTransfer
    ): WishlistItemRequestTransfer;

    public function mapWishlistItemTransferToRestWishlistItemsAttributesTransfer(
        WishlistItemTransfer $wishlistItemTransfer,
        RestWishlistItemsAttributesTransfer $restWishlistItemsAttributesTransfer
    ): RestWishlistItemsAttributesTransfer;
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationWishlistsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use Generated\Shared\Transfer\RestWishlistItemProductConfigurationInstanceAttributesTransfer;

interface ProductConfigurationInstanceMapperInterface
{
    public function mapRestWishlistItemProductConfigurationInstanceAttributesToProductConfigurationInstance(
        RestWishlistItemProductConfigurationInstanceAttributesTransfer $restWishlistItemProductConfigurationInstanceAttributesTransfer,
        ProductConfigurationInstanceTransfer $productConfigurationInstanceTransfer
    ): ProductConfigurationInstanceTransfer;

    public function mapProductConfigurationInstanceToRestWishlistItemProductConfigurationInstanceAttributes(
        ProductConfigurationInstanceTransfer $productConfigurationInstanceTransfer,
        RestWishlistItemProductConfigurationInstanceAttributesTransfer $restWishlistItemProductConfigurationInstanceAttributesTransfer
    ): RestWishlistItemProductConfigurationInstanceAttributesTransfer;
}

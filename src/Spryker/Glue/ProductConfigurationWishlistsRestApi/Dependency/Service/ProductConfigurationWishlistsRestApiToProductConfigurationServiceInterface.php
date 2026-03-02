<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationWishlistsRestApi\Dependency\Service;

use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;

interface ProductConfigurationWishlistsRestApiToProductConfigurationServiceInterface
{
    public function getProductConfigurationInstanceHash(ProductConfigurationInstanceTransfer $productConfigurationInstanceTransfer): string;
}

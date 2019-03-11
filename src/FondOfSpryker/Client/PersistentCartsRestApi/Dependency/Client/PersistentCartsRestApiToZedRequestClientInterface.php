<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client;

use Spryker\Shared\Kernel\Transfer\TransferInterface;

interface PersistentCartsRestApiToZedRequestClientInterface
{
    /**
     * @param string $url
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $object
     * @param array|null $requestOptions
     *
     * @return \Spryker\Shared\Kernel\Transfer\TransferInterface
     */
    public function call($url, TransferInterface $object, $requestOptions = null): TransferInterface;
}

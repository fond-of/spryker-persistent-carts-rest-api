<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi;

use FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStub;
use FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class PersistentCartsRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStubInterface
     */
    public function createZedPersistentCartsRestApiStub(): PersistentCartsRestApiStubInterface
    {
        return new PersistentCartsRestApiStub($this->getZedRequestClient());
    }

    /**
     * @throws
     *
     * @return \FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface
     */
    protected function getZedRequestClient(): PersistentCartsRestApiToZedRequestClientInterface
    {
        return $this->getProvidedDependency(PersistentCartsRestApiDependencyProvider::CLIENT_ZED_REQUEST);
    }
}

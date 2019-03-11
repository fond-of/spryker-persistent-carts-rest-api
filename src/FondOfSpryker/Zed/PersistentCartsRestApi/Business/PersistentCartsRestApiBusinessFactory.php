<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi\Business;

use FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface;
use FondOfSpryker\Zed\PersistentCartsRestApi\PersistentCartsRestApiDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class PersistentCartsRestApiBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @throws
     *
     * @return \FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface
     */
    public function getQuoteFacade(): PersistentCartsRestApiToQuoteFacadeInterface
    {
        return $this->getProvidedDependency(PersistentCartsRestApiDependencyProvider::FACADE_QUOTE);
    }
}

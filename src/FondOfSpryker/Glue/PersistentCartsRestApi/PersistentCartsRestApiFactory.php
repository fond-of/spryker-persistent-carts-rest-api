<?php

namespace FondOfSpryker\Glue\PersistentCartsRestApi;

use FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote\QuoteCollectionReader;
use FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote\QuoteCollectionReaderInterface;
use Spryker\Glue\Kernel\AbstractFactory;

/**
 * @method \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface getClient()
 */
class PersistentCartsRestApiFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote\QuoteCollectionReaderInterface
     */
    public function createQuoteCollectionReader(): QuoteCollectionReaderInterface
    {
        return new QuoteCollectionReader($this->getClient());
    }
}

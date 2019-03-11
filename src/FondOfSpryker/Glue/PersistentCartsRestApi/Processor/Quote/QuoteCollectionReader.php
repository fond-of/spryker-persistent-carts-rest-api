<?php

namespace FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote;

use FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class QuoteCollectionReader implements QuoteCollectionReaderInterface
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface
     */
    protected $persistentCartsRestApiClient;

    /**
     * @param \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface $persistentCartsRestApiClient
     */
    public function __construct(PersistentCartsRestApiClientInterface $persistentCartsRestApiClient)
    {
        $this->persistentCartsRestApiClient = $persistentCartsRestApiClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollectionByCriteria(
        QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
    ): QuoteCollectionTransfer {
        return $this->persistentCartsRestApiClient->getQuoteCollectionByCriteria($quoteCriteriaFilterTransfer);
    }
}

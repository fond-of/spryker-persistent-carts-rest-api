<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi\Zed;

use FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class PersistentCartsRestApiStub implements PersistentCartsRestApiStubInterface
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(PersistentCartsRestApiToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollectionByCriteria(
        QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
    ): QuoteCollectionTransfer {
        /** @var \Generated\Shared\Transfer\QuoteCollectionTransfer $quoteCollectionTransfer */
        $quoteCollectionTransfer = $this->zedRequestClient->call(
            '/persistent-carts-rest-api/gateway/get-quote-collection-by-criteria',
            $quoteCriteriaFilterTransfer
        );

        return $quoteCollectionTransfer;
    }
}

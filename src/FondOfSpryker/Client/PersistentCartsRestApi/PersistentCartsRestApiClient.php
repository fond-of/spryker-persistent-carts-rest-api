<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi;

use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiFactory getFactory()
 */
class PersistentCartsRestApiClient extends AbstractClient implements PersistentCartsRestApiClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollectionByCriteria(
        QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
    ): QuoteCollectionTransfer {
        return $this->getFactory()
            ->createZedPersistentCartsRestApiStub()
            ->getQuoteCollectionByCriteria($quoteCriteriaFilterTransfer);
    }
}

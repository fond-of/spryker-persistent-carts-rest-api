<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi\Business;

use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\PersistentCartsRestApi\Business\PersistentCartsRestApiBusinessFactory getFactory()
 */
class PersistentCartsRestApiFacade extends AbstractFacade implements PersistentCartsRestApiFacadeInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollectionByCriteria(
        QuoteCriteriaFilterTransfer $quoteCriteriaFilterTransfer
    ): QuoteCollectionTransfer {
        return $this->getFactory()->getQuoteFacade()->getQuoteCollection($quoteCriteriaFilterTransfer);
    }
}

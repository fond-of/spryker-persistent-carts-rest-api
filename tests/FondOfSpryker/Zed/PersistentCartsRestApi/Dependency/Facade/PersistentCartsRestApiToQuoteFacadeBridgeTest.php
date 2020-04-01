<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;
use Spryker\Zed\Quote\Business\QuoteFacadeInterface;

class PersistentCartsRestApiToQuoteFacadeBridgeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeBridge
     */
    protected $persistentCartsRestApiToQuoteFacadeBridge;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Quote\Business\QuoteFacadeInterface
     */
    protected $quoteFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCriteriaFilterTransfer
     */
    protected $quoteCriteriaFilterTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    protected $quoteCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->quoteFacadeInterfaceMock = $this->getMockBuilder(QuoteFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCriteriaFilterTransferMock = $this->getMockBuilder(QuoteCriteriaFilterTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCollectionTransferMock = $this->getMockBuilder(QuoteCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiToQuoteFacadeBridge = new PersistentCartsRestApiToQuoteFacadeBridge(
            $this->quoteFacadeInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetQuoteCollection(): void
    {
        $this->quoteFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('getQuoteCollection')
            ->willReturn($this->quoteCollectionTransferMock);

        $this->assertInstanceOf(
            QuoteCollectionTransfer::class,
            $this->persistentCartsRestApiToQuoteFacadeBridge->getQuoteCollection(
                $this->quoteCriteriaFilterTransferMock
            )
        );
    }
}

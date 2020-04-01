<?php

namespace FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote;

use Codeception\Test\Unit;
use FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class QuoteCollectionReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Glue\PersistentCartsRestApi\Processor\Quote\QuoteCollectionReader
     */
    protected $quoteCollectionReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClientInterface
     */
    protected $persistentCartsRestApiClientInterfaceMock;

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
        $this->persistentCartsRestApiClientInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCriteriaFilterTransferMock = $this->getMockBuilder(QuoteCriteriaFilterTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCollectionTransferMock = $this->getMockBuilder(QuoteCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCollectionReader = new QuoteCollectionReader(
            $this->persistentCartsRestApiClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetQuoteCollectionByCriteria(): void
    {
        $this->persistentCartsRestApiClientInterfaceMock->expects($this->atLeastOnce())
            ->method('getQuoteCollectionByCriteria')
            ->with($this->quoteCriteriaFilterTransferMock)
            ->willReturn($this->quoteCollectionTransferMock);

        $this->assertInstanceOf(
            QuoteCollectionTransfer::class,
            $this->quoteCollectionReader->getQuoteCollectionByCriteria(
                $this->quoteCriteriaFilterTransferMock
            )
        );
    }
}

<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class PersistentCartsRestApiStubTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStub
     */
    protected $persistentCartsRestApiStub;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface
     */
    protected $persistentCartsRestApiToZedRequestClientInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCriteriaFilterTransfer
     */
    protected $quoteCriteriaFilterTransferMock;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    protected $quoteCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->persistentCartsRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCriteriaFilterTransferMock = $this->getMockBuilder(QuoteCriteriaFilterTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->url = '/persistent-carts-rest-api/gateway/get-quote-collection-by-criteria';

        $this->quoteCollectionTransferMock = $this->getMockBuilder(QuoteCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiStub = new PersistentCartsRestApiStub(
            $this->persistentCartsRestApiToZedRequestClientInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testGetQuoteCollectionByCriteria(): void
    {
        $this->persistentCartsRestApiToZedRequestClientInterfaceMock->expects($this->atLeastOnce())
            ->method('call')
            ->with(
                $this->url,
                $this->quoteCriteriaFilterTransferMock
            )->willReturn($this->quoteCollectionTransferMock);

        $this->assertInstanceOf(
            QuoteCollectionTransfer::class,
            $this->persistentCartsRestApiStub->getQuoteCollectionByCriteria(
                $this->quoteCriteriaFilterTransferMock
            )
        );
    }
}

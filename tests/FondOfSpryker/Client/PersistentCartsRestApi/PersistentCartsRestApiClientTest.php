<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStubInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class PersistentCartsRestApiClientTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiClient
     */
    protected $persistentCartsRestApiClient;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiFactory
     */
    protected $persistentCartsRestApiFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCriteriaFilterTransfer
     */
    protected $quoteCriteriaFilterTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStubInterface
     */
    protected $persistentCartsRestApiStubInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    protected $quoteCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->persistentCartsRestApiFactoryMock = $this->getMockBuilder(PersistentCartsRestApiFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCriteriaFilterTransferMock = $this->getMockBuilder(QuoteCriteriaFilterTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiStubInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiStubInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCollectionTransferMock = $this->getMockBuilder(QuoteCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiClient = new PersistentCartsRestApiClient();
        $this->persistentCartsRestApiClient->setFactory($this->persistentCartsRestApiFactoryMock);
    }

    /**
     * @return void
     */
    public function testGetQuoteCollectionByCriteria(): void
    {
        $this->persistentCartsRestApiFactoryMock->expects($this->atLeastOnce())
            ->method('createZedPersistentCartsRestApiStub')
            ->willReturn($this->persistentCartsRestApiStubInterfaceMock);

        $this->persistentCartsRestApiStubInterfaceMock->expects($this->atLeastOnce())
            ->method('getQuoteCollectionByCriteria')
            ->with($this->quoteCriteriaFilterTransferMock)
            ->willReturn($this->quoteCollectionTransferMock);

        $this->assertInstanceOf(
            QuoteCollectionTransfer::class,
            $this->persistentCartsRestApiClient->getQuoteCollectionByCriteria(
                $this->quoteCriteriaFilterTransferMock
            )
        );
    }
}

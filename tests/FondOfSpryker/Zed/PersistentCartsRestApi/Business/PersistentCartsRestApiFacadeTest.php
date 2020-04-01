<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface;
use Generated\Shared\Transfer\QuoteCollectionTransfer;
use Generated\Shared\Transfer\QuoteCriteriaFilterTransfer;

class PersistentCartsRestApiFacadeTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PersistentCartsRestApi\Business\PersistentCartsRestApiFacade
     */
    protected $persistentCartsRestApiFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PersistentCartsRestApi\Business\PersistentCartsRestApiBusinessFactory
     */
    protected $persistentCartsRestApiBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCriteriaFilterTransfer
     */
    protected $quoteCriteriaFilterTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface
     */
    protected $persistentCartsRestApiToQuoteFacadeInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    protected $quoteCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->persistentCartsRestApiBusinessFactoryMock = $this->getMockBuilder(PersistentCartsRestApiBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCriteriaFilterTransferMock = $this->getMockBuilder(QuoteCriteriaFilterTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiToQuoteFacadeInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiToQuoteFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->quoteCollectionTransferMock = $this->getMockBuilder(QuoteCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiFacade = new PersistentCartsRestApiFacade();
        $this->persistentCartsRestApiFacade->setFactory($this->persistentCartsRestApiBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testGetQuoteCollectionByCriteria(): void
    {
        $this->persistentCartsRestApiBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('getQuoteFacade')
            ->willReturn($this->persistentCartsRestApiToQuoteFacadeInterfaceMock);

        $this->persistentCartsRestApiToQuoteFacadeInterfaceMock->expects($this->atLeastOnce())
            ->method('getQuoteCollection')
            ->with($this->quoteCriteriaFilterTransferMock)
            ->willReturn($this->quoteCollectionTransferMock);

        $this->assertInstanceOf(
            QuoteCollectionTransfer::class,
            $this->persistentCartsRestApiFacade->getQuoteCollectionByCriteria(
                $this->quoteCriteriaFilterTransferMock
            )
        );
    }
}

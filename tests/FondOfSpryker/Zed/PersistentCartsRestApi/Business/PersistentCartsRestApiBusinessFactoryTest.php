<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface;
use FondOfSpryker\Zed\PersistentCartsRestApi\PersistentCartsRestApiDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PersistentCartsRestApiBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PersistentCartsRestApi\Business\PersistentCartsRestApiBusinessFactory
     */
    protected $persistentCartsRestApiBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PersistentCartsRestApi\Dependency\Facade\PersistentCartsRestApiToQuoteFacadeInterface
     */
    protected $persistentCartsRestApiToQuoteFacadeInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiToQuoteFacadeInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiToQuoteFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiBusinessFactory = new PersistentCartsRestApiBusinessFactory();
        $this->persistentCartsRestApiBusinessFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetQuoteFacade(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(PersistentCartsRestApiDependencyProvider::FACADE_QUOTE)
            ->willReturn($this->persistentCartsRestApiToQuoteFacadeInterfaceMock);

        $this->assertInstanceOf(
            PersistentCartsRestApiToQuoteFacadeInterface::class,
            $this->persistentCartsRestApiBusinessFactory->getQuoteFacade()
        );
    }
}

<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi;

use Codeception\Test\Unit;
use FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface;
use FondOfSpryker\Client\PersistentCartsRestApi\Zed\PersistentCartsRestApiStubInterface;
use Spryker\Client\Kernel\Container;

class PersistentCartsRestApiFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiFactory
     */
    protected $persistentCartsRestApiFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Client\PersistentCartsRestApi\Dependency\Client\PersistentCartsRestApiToZedRequestClientInterface
     */
    protected $persistentCartsRestApiToZedRequestClientInterfaceMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiToZedRequestClientInterfaceMock = $this->getMockBuilder(PersistentCartsRestApiToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiFactory = new PersistentCartsRestApiFactory();
        $this->persistentCartsRestApiFactory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testCreateZedPersistentCartsRestApiStub(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(PersistentCartsRestApiDependencyProvider::CLIENT_ZED_REQUEST)
            ->willReturn($this->persistentCartsRestApiToZedRequestClientInterfaceMock);

        $this->assertInstanceOf(
            PersistentCartsRestApiStubInterface::class,
            $this->persistentCartsRestApiFactory->createZedPersistentCartsRestApiStub()
        );
    }
}

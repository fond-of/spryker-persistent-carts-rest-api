<?php

namespace FondOfSpryker\Client\PersistentCartsRestApi;

use Codeception\Test\Unit;
use Spryker\Client\Kernel\Container;

class PersistentCartsRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\PersistentCartsRestApi\PersistentCartsRestApiDependencyProvider
     */
    protected $persistentCartsRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Client\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->persistentCartsRestApiDependencyProvider = new PersistentCartsRestApiDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideServiceLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->persistentCartsRestApiDependencyProvider->provideServiceLayerDependencies(
                $this->containerMock
            )
        );
    }
}

<?php

namespace FondOfSpryker\Zed\PersistentCartsRestApi;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class PersistentCartsRestApiDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PersistentCartsRestApi\PersistentCartsRestApiDependencyProvider
     */
    protected $persistentCartsRestApiDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
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
    public function testProvideBusinessLayerDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->persistentCartsRestApiDependencyProvider->provideBusinessLayerDependencies(
                $this->containerMock
            )
        );
    }
}

<?php

namespace FondOfOryx\Zed\ConcreteProductApi\Communication\Plugin\Api;

use Codeception\Test\Unit;
use FondOfOryx\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade;
use FondOfOryx\Zed\ConcreteProductApi\ConcreteProductApiConfig;
use Generated\Shared\Transfer\ApiRequestTransfer;

class ConcreteProductApiValidatorPluginTest extends Unit
{
    /**
     * @var \FondOfOryx\Zed\ConcreteProductApi\Communication\Plugin\Api\ConcreteProductApiValidatorPlugin
     */
    protected $concreteProductApiValidatorPlugin;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\ApiRequestTransfer
     */
    protected $apiRequestTransferMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfOryx\Zed\ConcreteProductApi\Business\ConcreteProductApiFacade
     */
    protected $concreteProductApiFacadeMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->concreteProductApiFacadeMock = $this->getMockBuilder(ConcreteProductApiFacade::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->apiRequestTransferMock = $this->getMockBuilder(ApiRequestTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->concreteProductApiValidatorPlugin = new ConcreteProductApiValidatorPlugin();
        $this->concreteProductApiValidatorPlugin->setFacade($this->concreteProductApiFacadeMock);
    }

    /**
     * @return void
     */
    public function testGetResourceName(): void
    {
        static::assertEquals(
            ConcreteProductApiConfig::RESOURCE_CONCRETE_PRODUCTS,
            $this->concreteProductApiValidatorPlugin->getResourceName(),
        );
    }

    /**
     * @return void
     */
    public function testValidate(): void
    {
        $errors = [];

        $this->concreteProductApiFacadeMock->expects($this->atLeastOnce())
            ->method('validate')
            ->with($this->apiRequestTransferMock)
            ->willReturn([]);

        static::assertEquals(
            $errors,
            $this->concreteProductApiValidatorPlugin->validate($this->apiRequestTransferMock),
        );
    }
}

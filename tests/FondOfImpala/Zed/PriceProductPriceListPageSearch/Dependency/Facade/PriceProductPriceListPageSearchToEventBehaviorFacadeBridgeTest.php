<?php

namespace FondOfImpala\Zed\PriceProductPriceListPageSearch\Dependency\Facade;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\EventEntityTransfer;
use PHPUnit\Framework\MockObject\MockObject;
use Spryker\Zed\EventBehavior\Business\EventBehaviorFacadeInterface;

class PriceProductPriceListPageSearchToEventBehaviorFacadeBridgeTest extends Unit
{
    protected PriceProductPriceListPageSearchToEventBehaviorFacadeBridge $priceProductPriceListPageSearchToEventBehaviorFacadeBridge;

    protected MockObject|EventBehaviorFacadeInterface $eventBehaviorFacadeInterfaceMock;

    protected MockObject|EventEntityTransfer $eventEntityTransferMock;

    protected array $eventTransfers;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->eventBehaviorFacadeInterfaceMock = $this->getMockBuilder(EventBehaviorFacadeInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->eventEntityTransferMock = $this->getMockBuilder(EventEntityTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->eventTransfers = [
            $this->eventBehaviorFacadeInterfaceMock,
        ];

        $this->priceProductPriceListPageSearchToEventBehaviorFacadeBridge = new PriceProductPriceListPageSearchToEventBehaviorFacadeBridge($this->eventBehaviorFacadeInterfaceMock);
    }

    /**
     * @return void
     */
    public function testGetEventTransferIds(): void
    {
        $this->eventBehaviorFacadeInterfaceMock->expects(static::atLeastOnce())
            ->method('getEventTransferIds')
            ->willReturn($this->eventTransfers);

        static::assertIsArray($this->priceProductPriceListPageSearchToEventBehaviorFacadeBridge->getEventTransferIds($this->eventTransfers));
    }

    /**
     * @return void
     */
    public function testGetEventTransferForeignKeys(): void
    {
        $this->eventBehaviorFacadeInterfaceMock->expects(static::atLeastOnce())
            ->method('getEventTransferForeignKeys')
            ->willReturn($this->eventTransfers);

        static::assertIsArray($this->priceProductPriceListPageSearchToEventBehaviorFacadeBridge->getEventTransferForeignKeys($this->eventTransfers, 'fk_key'));
    }
}

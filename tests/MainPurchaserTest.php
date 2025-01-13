<?php

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\MainPurchaser;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class MainPurchaserTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Venture\Project\MainPurchaser
     */
    protected MainPurchaser $purchaser;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->purchaser = new MainPurchaser;
    }

    /**
     * @doesNotPerformAssertions
     * @return void
     */
    public function testPurchaser(): void
    {
        $this->purchaser
            ->setDepositAmount(1000)
            ->setSubscriberNumber(getenv('SUBSCRIBER_NUMBER'))
            ->setPersonalIdentificationNumber(getenv('PERSONAL_IDENTIFICATION_NUMBER'))
            ->setAuthenticationPassword(getenv('AUTHENTICATION_PASSWORD'))
            ->setPurchasePassword(getenv('PURCHASE_PASSWORD'))
            ->purchase(stadiumId: 24, raceNumber: 12, purchaseType: 6, forecasts: [
                '123' => '500',
                '124' => '500',
            ]);
    }
}

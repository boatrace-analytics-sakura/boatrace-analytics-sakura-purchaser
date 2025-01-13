<?php

namespace Boatrace\Venture\Project\Tests;

use Boatrace\Venture\Project\Purchaser;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class PurchaserTest extends PHPUnitTestCase
{
    /**
     * @doesNotPerformAssertions
     * @return void
     */
    public function testPurchaser(): void
    {
        Purchaser::setDepositAmount(1000)
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

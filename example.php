<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Venture\Project\Purchaser;

Purchaser::setDepositAmount(1000)             // 入金指示金額
    ->setSubscriberNumber('xxxxxxxx')         // 加入者番号
    ->setPersonalIdentificationNumber('xxxx') // 暗証番号
    ->setAuthenticationPassword('xxxxxx')     // 認証用パスワード
    ->setPurchasePassword('xxxxxx')           // 投票用パスワード
    ->purchase(stadiumId: 24, raceNumber: 12, purchaseType: 3, forecasts: [
        '12' => '300',
        '13' => '300',
        '14' => '200',
        '15' => '200',
    ]);

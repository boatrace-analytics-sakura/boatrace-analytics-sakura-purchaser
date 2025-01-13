# Purchaser in the Boatrace Venture Project

[![Latest Stable Version](https://poser.pugx.org/bvp/purchaser/v/stable)](https://packagist.org/packages/bvp/purchaser)
[![Latest Unstable Version](https://poser.pugx.org/bvp/purchaser/v/unstable)](https://packagist.org/packages/bvp/purchaser)
[![License](https://poser.pugx.org/bvp/purchaser/license)](https://packagist.org/packages/bvp/purchaser)

Purchaser in the Boatrace Venture Projectは舟券を自動購入するためのPHPライブラリです。

## Installation
```bash
composer require bvp/purchaser
```

## Usage
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Boatrace\Venture\Project\Purchaser;

// テレボートに5000円を入金して大村12Rの3連単(1-23-234)を購入する場合は以下の通りです。
// なお、加入者番号、暗証番号、認証用パスワード、投票用パスワードの部分は自分のテレボート会員情報に書き換えてください。
// stadiumId: 1 - 24
// raceNumber: 1 - 12
// purchaseType: 1 - 7
//   1 => 単勝, 2 => 複勝, 3 => 2連単, 4 => 2連複, 5 => 拡連複, 6 => 3連単, 7 => 3連複
Purchaser::setDepositAmount(5000)             // 入金指示金額
    ->setSubscriberNumber('xxxxxxxx')         // 加入者番号
    ->setPersonalIdentificationNumber('xxxx') // 暗証番号
    ->setAuthenticationPassword('xxxxxx')     // 認証用パスワード
    ->setPurchasePassword('xxxxxx')           // 投票用パスワード
    ->purchase(stadiumId: 24, raceNumber: 12, purchaseType: 6, forecasts: [
        '123' => '1500',                      // 組番 => 購入金額
        '124' => '1500',                      // 組番 => 購入金額
        '132' => '1000',                      // 組番 => 購入金額
        '134' => '1000',                      // 組番 => 購入金額
    ]);
```

## Quick Start
### Step 1
このリポジトリをクローンします。
```bash
git clone git@github.com:BoatraceVentureProject/Purchaser.git
```

### Step 2
必要なライブラリをインストールします。
```bash
cd Purchaser && composer install
```

### Step 3
加入者番号、暗証番号、認証用パスワード、投票用パスワード、買い目をそれぞれ書き換えます。
```bash
code example.php
```

### Step 4
Google Chromeの[Selenium Grid Server](https://github.com/SeleniumHQ/docker-selenium)を起動します。
```bash
docker run -d -p 4444:4444 --shm-size="2g" --name selenium-standalone-chrome selenium/standalone-chrome:4.2.2-20220622
```

### Step 5
購入プログラムを実行します。
```bash
php example.php
```

## Testing
テレボート会員情報を環境変数に設定します。
```bash
$env:SUBSCRIBER_NUMBER = "加入者番号"
$env:PERSONAL_IDENTIFICATION_NUMBER = "暗証番号"
$env:AUTHENTICATION_PASSWORD = "認証用パスワード"
$env:PURCHASE_PASSWORD = "投票用パスワード"
```

Selenium Serverを起動します。
```bash
npm install selenium-standalone --save-dev
npx selenium-standalone install
npx selenium-standalone start
```

購入テストを実行します。
```bash
vendor/bin/phpunit
```

## Disclaimer
このライブラリを使用して舟券を自動購入する際には、以下の点に十分ご注意ください。

1. 自己責任

本ライブラリを使用した結果として発生した如何なる損害（経済的損失、データ損失、法的問題など）についても、作者および貢献者は一切の責任を負いません。すべてのリスクは利用者自身が負うものとします。

2. 法的遵守

舟券の購入や自動化に関する法規制は国や地域によって異なる場合があります。本ライブラリを使用する前に、必ずご自身の居住地域における関連法規を確認してください。不適切または違法な使用について、作者は一切の責任を負いません。

3. 利用上のリスク

公営競技の投票システムやAPI仕様の変更、技術的トラブル、予期せぬ動作による購入エラーが発生する可能性があります。これらによって生じた損失について、作者は責任を負いません。

### 推奨事項

- 本ライブラリをテスト環境や小額で検証してから使用してください。
- ソースコードを理解した上で、責任を持って運用してください。
- ご不明点がある場合は、必ず専門家に相談してください。

## License
Purchaser in the Boatrace Venture Project is open source software licensed under the [MIT license](LICENSE).

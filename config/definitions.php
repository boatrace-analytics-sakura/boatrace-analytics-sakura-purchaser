<?php

return [
    'Purchaser' => \DI\create('\Boatrace\Venture\Project\Purchaser')->constructor(
        \DI\get('MainPurchaser')
    ),
    'MainPurchaser' => function ($container) {
        return $container->get('\Boatrace\Venture\Project\MainPurchaser');
    },
    'ChromeOptions' => function ($container) {
        return $container->get('\Facebook\WebDriver\Chrome\ChromeOptions');
    },
];

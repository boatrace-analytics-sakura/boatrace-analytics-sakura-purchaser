<?php

namespace Boatrace\Venture\Project;

use DI\Container;
use DI\ContainerBuilder;
use Facebook\WebDriver\Chrome\ChromeOptions;

/**
 * @author shimomo
 */
class Purchaser
{
    /**
     * @var array
     */
    protected static array $instances;

    /**
     * @var \DI\Container
     */
    protected static Container $container;

    /**
     * @param  \Boatrace\Venture\Project\MainPurchaser  $purchaser
     * @return void
     */
    public function __construct(protected MainPurchaser $purchaser){}

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Venture\Project\MainPurchaser
     */
    public function __call(string $name, array $arguments): MainPurchaser
    {
        return $this->purchaser->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return \Boatrace\Venture\Project\MainPurchaser
     */
    public static function __callStatic(string $name, array $arguments): MainPurchaser
    {
        return self::getInstance('Purchaser')->$name(...$arguments);
    }

    /**
     * @param  string  $name
     * @return \Boatrace\Venture\Project\Purchaser|\Facebook\WebDriver\Chrome\ChromeOptions
     */
    public static function getInstance(string $name): Purchaser|ChromeOptions
    {
        return self::$instances[$name] ?? self::$instances[$name] = self::getContainer()->get($name);
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        return self::$container ?? self::$container = (function () {
            $builder = new ContainerBuilder;
            $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
            return $builder->build();
        })();
    }
}

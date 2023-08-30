<?php
/**
Цель: Обеспечивает, чтобы класс имел только один экземпляр, и предоставляет глобальную точку доступа к нему.
Характеристики: Применяется, когда требуется гарантировать единственный экземпляр класса, например,
для доступа к общему ресурсу или настройкам.

 **/

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$singletonInstance = Singleton::getInstance();

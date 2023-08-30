<?php

/**
Цель: Определяет интерфейс для создания объектов, но позволяет подклассам выбирать класс создаваемого объекта.
Характеристики: Используется для обеспечения гибкости в создании объектов, когда классы-продукты могут меняться,
а клиентский код остается стабильным.
 **/

interface Product {
    public function getDescription();
}

class ConcreteProductA implements Product {
    public function getDescription() {
        return "Product A";
    }
}

class ConcreteProductB implements Product {
    public function getDescription() {
        return "Product B";
    }
}

interface Creator {
    public function factoryMethod(): Product;
}

class ConcreteCreatorA implements Creator {
    public function factoryMethod(): Product {
        return new ConcreteProductA();
    }
}

class ConcreteCreatorB implements Creator {
    public function factoryMethod(): Product {
        return new ConcreteProductB();
    }
}

$creatorA = new ConcreteCreatorA();
$productA = $creatorA->factoryMethod();

$creatorB = new ConcreteCreatorB();
$productB = $creatorB->factoryMethod();

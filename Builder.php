<?php
/**
Цель: Отделяет создание сложного объекта от его представления, позволяя одному и тому же процессу построения создавать разные представления.
Характеристики: Применяется, когда объект имеет сложную структуру с множеством опций для конфигурации.
 **/


class Product {
    private $parts = [];

    public function addPart($part) {
        $this->parts[] = $part;
    }

    public function listParts() {
        return "Product parts: " . implode(', ', $this->parts);
    }
}

interface Builder {
    public function buildPartA();
    public function buildPartB();
    public function getResult(): Product;
}

class ConcreteBuilder implements Builder {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function buildPartA() {
        $this->product->addPart("Part A");
    }

    public function buildPartB() {
        $this->product->addPart("Part B");
    }

    public function getResult(): Product {
        return $this->product;
    }
}

class Director {
    public function build(Builder $builder) {
        $builder->buildPartA();
        $builder->buildPartB();
    }
}

$builder = new ConcreteBuilder();
$director = new Director();

$director->build($builder);
$product = $builder->getResult();
echo $product->listParts();

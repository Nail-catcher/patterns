<?php

/**
Цель: Определяет основные шаги алгоритма, оставляя подклассам возможность переопределить некоторые шаги.
Характеристики: Позволяет избежать дублирования кода в различных подклассах, обеспечивая единый алгоритм.

 **/

abstract class AbstractClass {
    public function templateMethod() {
        return "Abstract Class: " . $this->primitiveOperation1() . " " . $this->primitiveOperation2();
    }

    abstract protected function primitiveOperation1();
    abstract protected function primitiveOperation2();
}

class ConcreteClass extends AbstractClass {
    protected function primitiveOperation1() {
        return "Primitive Operation 1";
    }

    protected function primitiveOperation2() {
        return "Primitive Operation 2";
    }
}

$abstract = new ConcreteClass();
echo $abstract->templateMethod();

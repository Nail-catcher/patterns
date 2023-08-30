<?php
/**
Цель: Разделяет абстракцию и реализацию, позволяя изменять их независимо друг от друга.
Характеристики: Полезен, когда нужно избежать постоянного увеличения числа классов в иерархии из-за новых комбинаций функциональности.
 **/

interface Implementor {
    public function operationImpl();
}

class ConcreteImplementorA implements Implementor {
    public function operationImpl() {
        return "Concrete Implementor A";
    }
}

class ConcreteImplementorB implements Implementor {
    public function operationImpl() {
        return "Concrete Implementor B";
    }
}

abstract class Abstraction {
    protected $implementor;

    public function __construct(Implementor $implementor) {
        $this->implementor = $implementor;
    }

    abstract public function operation();
}

class RefinedAbstraction extends Abstraction {
    public function operation() {
        return "Refined Abstraction: " . $this->implementor->operationImpl();
    }
}

$implementorA = new ConcreteImplementorA();
$refinedAbstraction = new RefinedAbstraction($implementorA);

echo $refinedAbstraction->operation();

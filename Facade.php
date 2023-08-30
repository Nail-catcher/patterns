<?php
/**
Цель: Предоставляет унифицированный интерфейс для группы интерфейсов подсистемы, упрощая взаимодействие с ней.
Характеристики: Скрывает сложность взаимодействия с комплексной системой за простым интерфейсом.
 **/


class SubsystemA {
    public function operationA() {
        return "Subsystem A operation";
    }
}

class SubsystemB {
    public function operationB() {
        return "Subsystem B operation";
    }
}

class Facade {
    private $subsystemA;
    private $subsystemB;

    public function __construct() {
        $this->subsystemA = new SubsystemA();
        $this->subsystemB = new SubsystemB();
    }

    public function operation() {
        $result = "Facade initializes subsystems:\n";
        $result .= $this->subsystemA->operationA() . "\n";
        $result .= $this->subsystemB->operationB();
        return $result;
    }
}

$facade = new Facade();
echo $facade->operation();


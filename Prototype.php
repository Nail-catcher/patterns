<?php
/**
Цель: Позволяет создавать новые объекты путем клонирования существующих, обеспечивая гибкость и уменьшение накладных расходов на создание объекта.
Характеристики: Полезен, когда требуется создавать объекты с похожей структурой, но различными значениями.
 **/

interface Prototype {
    public function clone();
}

class ConcretePrototype implements Prototype {
    private $field;

    public function __construct($field) {
        $this->field = $field;
    }

    public function clone() {
        return new self($this->field);
    }

    public function getField() {
        return $this->field;
    }
}

$prototype = new ConcretePrototype("Initial Field");
$clone = $prototype->clone();
echo $clone->getField();

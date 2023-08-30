<?php

/**
Цель: Позволяет добавлять новую функциональность объектам, не изменяя их структуры.
Характеристики: Полезен, когда требуется динамически добавлять или изменять поведение объектов без изменения кода их базовых классов.
 **/

interface Component {
    public function operation();
}

class ConcreteComponent implements Component {
    public function operation() {
        return "Concrete Component";
    }
}

class Decorator implements Component {
    protected $component;

    public function __construct(Component $component) {
        $this->component = $component;
    }

    public function operation() {
        return "Decorator: " . $this->component->operation();
    }
}

class ConcreteDecoratorA extends Decorator {
    public function operation() {
        return parent::operation() . ", Added Behavior A";
    }
}

class ConcreteDecoratorB extends Decorator {
    public function operation() {
        return parent::operation() . ", Added Behavior B";
    }
}

$component = new ConcreteComponent();
$decoratorA = new ConcreteDecoratorA($component);
$decoratorB = new ConcreteDecoratorB($decoratorA);

echo $decoratorB->operation();

<?php
/**
Цель: Позволяет объекту изменять свое поведение в зависимости от внутреннего состояния.
Характеристики: Используется для управления сложным поведением, которое изменяется в зависимости от внутренних условий.
 **/

interface State {
    public function handle();
}

class ConcreteStateA implements State {
    public function handle() {
        return "Concrete State A";
    }
}

class ConcreteStateB implements State {
    public function handle() {
        return "Concrete State B";
    }
}

class Context {
    private $state;

    public function setState(State $state) {
        $this->state = $state;
    }

    public function request() {
        return $this->state->handle();
    }
}

$context = new Context();

$stateA = new ConcreteStateA();
$context->setState($stateA);
echo $context->request();

$stateB = new ConcreteStateB();
$context->setState($stateB);
echo $context->request();


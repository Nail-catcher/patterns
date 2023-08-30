<?php
/**
Цель: Определяет семейство алгоритмов, инкапсулирует их и делает их взаимозаменяемыми.
Характеристики: Позволяет менять алгоритмы независимо от клиентского кода.
 **/

interface Strategy {
    public function execute();
}

class ConcreteStrategyA implements Strategy {
    public function execute() {
        return "Concrete Strategy A";
    }
}

class ConcreteStrategyB implements Strategy {
    public function execute() {
        return "Concrete Strategy B";
    }
}

class Context {
    private $strategy;

    public function __construct(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeStrategy() {
        return $this->strategy->execute();
    }
}

$strategyA = new ConcreteStrategyA();
$strategyB = new ConcreteStrategyB();

$context = new Context($strategyA);
echo $context->executeStrategy();

$context->setStrategy($strategyB);
echo $context->executeStrategy();

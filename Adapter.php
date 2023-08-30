<?php
/**
Цель: Позволяет объектам с несовместимыми интерфейсами работать вместе.
Характеристики: Применяется, когда требуется обеспечить совместимость между классами, которые не могут работать напрямую друг с другом.
 **/

interface Target {
    public function request();
}

class Adaptee {
    public function specificRequest() {
        return "Specific Request";
    }
}

class Adapter implements Target {
    private $adaptee;

    public function __construct(Adaptee $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function request() {
        return $this->adaptee->specificRequest();
    }
}

$adaptee = new Adaptee();
$adapter = new Adapter($adaptee);

echo $adapter->request();

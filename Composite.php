<?php
/**
Цель: Позволяет создавать древовидные структуры объектов и работать с ними так же, как с отдельными объектами.
Характеристики: Применяется для построения иерархий объектов, где объекты могут быть частями других объектов.
 **/

interface Component {
    public function operation();
}

class Leaf implements Component {
    public function operation() {
        return "Leaf";
    }
}

class Composite implements Component {
    private $components = [];

    public function add(Component $component) {
        $this->components[] = $component;
    }

    public function operation() {
        $result = "Composite: ";
        foreach ($this->components as $component) {
            $result .= $component->operation() . ", ";
        }
        return rtrim($result, ', ');
    }
}

$leaf1 = new Leaf();
$leaf2 = new Leaf();
$composite = new Composite();

$composite->add($leaf1);
$composite->add($leaf2);

echo $composite->operation();

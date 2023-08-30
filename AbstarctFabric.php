<?php
/**
Цель: Предоставляет интерфейс для создания семейств взаимосвязанных или зависимых объектов без указания их конкретных классов.
Характеристики: Позволяет создавать группы объектов, которые должны взаимодействовать между собой, например,
разные типы кнопок и окон для разных операционных систем.
 **/
interface Button {
    public function render();
}

class WindowsButton implements Button {
    public function render() {
        return "Render Windows Button";
    }
}

class MacOSButton implements Button {
    public function render() {
        return "Render macOS Button";
    }
}

interface GUIFactory {
    public function createButton(): Button;
}

class WindowsFactory implements GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }
}

class MacOSFactory implements GUIFactory {
    public function createButton(): Button {
        return new MacOSButton();
    }
}

$osFactory = new WindowsFactory(); // or MacOSFactory
$button = $osFactory->createButton();
echo $button->render();

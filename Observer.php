<?php

/**
Цель: Определяет зависимость "один ко многим" между объектами так,
 чтобы при изменении состояния одного объекта все зависящие от него объекты автоматически уведомлялись и обновлялись.
Характеристики: Позволяет реализовать связь между объектами без тесной зависимости между ними.
 **/

interface Observer {
    public function update($data);
}

class ConcreteObserverA implements Observer {
    public function update($data) {
        return "Concrete Observer A: " . $data;
    }
}

class ConcreteObserverB implements Observer {
    public function update($data) {
        return "Concrete Observer B: " . $data;
    }
}

class Subject {
    private $observers = [];

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify($data) {
        $result = [];
        foreach ($this->observers as $observer) {
            $result[] = $observer->update($data);
        }
        return $result;
    }
}

$subject = new Subject();
$observerA = new ConcreteObserverA();
$observerB = new ConcreteObserverB();

$subject->attach($observerA);
$subject->attach($observerB);

$data = "Data has changed";
$notifications = $subject->notify($data);
print_r($notifications);

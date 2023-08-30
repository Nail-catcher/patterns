<?php

/**
Цель: Предоставляет объект-заместитель для контроля доступа к другому объекту.
Характеристики: Применяется для ограничения доступа, ленивой инициализации или кэширования.
 **/

interface Subject {
    public function request();
}

class RealSubject implements Subject {
    public function request() {
        return "Real Subject request";
    }
}

class Proxy implements Subject {
    private $realSubject;

    public function __construct(RealSubject $realSubject) {
        $this->realSubject = $realSubject;
    }

    public function request() {
        return "Proxy: " . $this->realSubject->request();
    }
}

$realSubject = new RealSubject();
$proxy = new Proxy($realSubject);

echo $proxy->request();

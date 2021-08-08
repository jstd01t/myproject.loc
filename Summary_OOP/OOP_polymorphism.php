<?php

class A
{
    public function sayHello()
    {
        return 'Hello, I am A';
    }
}

class B extends A
{
    public function sayHello()
    {
        return 'Hello, I am B';         // или    return parent::sayHello() . '. It was joke, I am B :)';
    }
}

$a = new A();
$b = new B();

var_dump($a instanceof B);
echo $b->sayHello();

// Абстрактные классы в PHP

abstract class AbstractClass
{
    abstract public function getValue(); // создать объект абстр класса нельзя, от него можно только наследоваться

    public function printValue()           // он также может содержать обычные методы
    {
        echo 'Значение: ' . $this->getValue();
    }
}

class ClassA extends AbstractClass      // дочерние классы обязаны реализовать метод getValue(), иначе ошибка
{
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
    public function getValue()
    {
        return $this->value;
    }
}

$object = new ClassA('kek');
$object->printValue();


// пример на человеках)

abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.' . '<br>';
    }

}

class EnglishMan extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

class RussianMan extends HumanAbstract
{
    public function getGreetings(): string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

$english = new EnglishMan('Donald');
$russian = new RussianMan('Вован');

echo $english->introduceYourself();
echo $russian->introduceYourself();
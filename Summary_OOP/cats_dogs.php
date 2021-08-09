<?php

/**Ковариантность и контравариантность
Ковариантность позволяет дочернему методу возвращать более конкретный тип, чем тип возвращаемого значения его
родительского метода. В то время как контравариантность позволяет типу параметра в дочернем методе быть менее
специфичным, чем в родительском.*/

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function eat(AnimalFood $food)
    {
        echo $this->name . " ест " . get_class($food);
    }
    abstract public function speak();
}




class Dog extends Animal
{
    public function eat(Food $food) { //Контрвариативность. Тут мы расширили возможности в питании дочернего класса.
        echo $this->name . " ест " . get_class($food);
    }
    public function speak()
    {
        echo $this->name . " лает";  //Ковариантность. Тут мы возвращаем более конкретное значение, чем в родительском классе.
    }
}

class Cat extends Animal
{
    public function speak()
    {
        echo $this->name . " мяукает";
    }
}

interface AnimalShelter
{
    public function adopt(string $name): Animal;
}

class CatShelter implements AnimalShelter
{
    public function adopt(string $name): Cat // Возвращаем класс Cat вместо Animal
    {
        return new Cat($name);
    }
}

class DogShelter implements AnimalShelter
{
    public function adopt(string $name): Dog // Возвращаем класс Dog вместо Animal
    {
        return new Dog($name);
    }
}

$kitty = (new CatShelter)->adopt("Рыжик");
$kitty->speak();
echo "\n";

$doggy = (new DogShelter)->adopt("Бобик");
$doggy->speak();

class Food {}

class AnimalFood extends Food {}

$kitty = (new CatShelter)->adopt("Рыжик");
$catFood = new AnimalFood();
$kitty->eat($catFood);
echo "\n";

$doggy = (new DogShelter)->adopt("Бобик");
$banana = new Food();
$doggy->eat($banana);

echo Cat::class;

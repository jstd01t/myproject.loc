<?php


// $this - это просто текущий объект
// геттеры и сеттеры могут устанавливать свойства для классов, в т.ч. для приватных

class Cat
{
    private $name;  # Перед именем свойства всегда ставится модификатор доступа.
    private $color;

    public $weight;

    // Конструктор принято объявлять в начале класса, после объявления свойств, но перед другими методами.
    // ниже задаются обязательные параметры, без которых не создать экземпляр, в т.ч. когда они privat.
    // далее идут Методы объектов
    // __construct гарантирует, что у экземпляров класса всегда будет указано значение(string) для этого свойства
    // иначе при вызове метода геттера (если забыть указать без конструктора) по этому параметру вернется null (ошибка)
    public function __construct(string $name, string $color)

    {
        $this->name = $name;
        $this->color = $color;
    }

    // ниже образец метода сеттера, в данном случае он с echo и произведет output,
    // но там где необходимо произвести возвращение-return необходимы методы геттеры

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setColor(string $color)
    {
        $this->color = $color;
    }

    public function getName(): string   // образец метода геттера
    {
        return $this->name;
    }

    public function sayHello()
    {
        echo 'Hello, my name is ' . $this->name . ', and i`m ' . $this->color . PHP_EOL;
    }

    public function getColor(): string
    {
        return $this->color;
    }
}

$cat3 = new Cat('KiKi', 'green'); // создание экземпляра и определение его свойств из приватного модификатора (иначе ошибка)
$cat3->weight = '3.5';      // определение свойств экземпляра при публичном модификаторе
echo $cat3->weight;         // возврат свойств с публичным модиф-ром
echo $cat3 -> sayHello();
echo $cat3->getName();      // возврат свойств при приватном модиф-ре свойства

// ниже установление свойств экземпляра, если надо изменить свойство или говнокод(?) с приватным модификатором без конструктора
$cat3->setColor('red');
echo $cat3->getColor();

$cat4 = new Cat('Barsik', 'rudy');
$cat5 = new Cat('Snow', 'white');
echo $cat4->sayHello();
echo $cat5->sayHello();





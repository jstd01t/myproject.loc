<?php

// Интерфейс – это описание public методов, которые представляют собой только название метода, описание их
// аргументов и возвращаемый тип. Тело метода в интерфейсе не описывается.
// Давайте создадим интерфейс для нашего случая.

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare {// Interface2, Interface3
    // Один класс может реализовывать сразу несколько интерфейсов, в таком случае они просто перечисляются через запятую.

    const PI = 3.1416;
    // Константы принято задавать в самом начале класса и называть их CAPS-ом с подчеркушками.
    // например DB_NAME, COUNT_OF_OBJECTS

    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float
    {
        return self::PI * ($this->r ** 2);          //   обращение к константе
    }
    //   Теперь мы можем использовать её и в других методах. Или даже в других классах, обратившись к ней
    //   через Circle::PI
}

class Rectangle
{
    private $x;
    private $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Square implements CalculateSquare
{
    private $x;

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

/*Если же мы напишем, что класс реализует какой-то интерфейс, но не реализуем его, то получим ошибку. Об этом нам даже
подскажет IDE. Давайте удалим метод calculateSquare() из класса Circle. IDE любезно подчеркнёт красным строку, в
которой мы говорим, что класс реализует интерфейс.*/

/*В программировании зачастую требуется проверить, что перед нами сейчас какой-то конкретный тип объектов, то есть
что перед нами экземпляр какого-то класса, либо что этот объект реализует какой-то интерфейс.
Для этого используется конструкция instanceof. С её помощью можно понять, является ли объект экземпляром какого-то
класса, или реализует интерфейс. Эта конструкция возвращает true или false.*/

$circle1 = new Circle(2.5);
var_dump($circle1 instanceof Circle); // true. это экземпляр класса Circle

var_dump($circle1 instanceof Rectangle); // false. это не экземпляр класса Rectangle.

var_dump($circle1 instanceof CalculateSquare); // true . да, он реализует интерфейс CalculateSquare

// создадим объекты:

$objects = [
    new Square(5),
    new Rectangle (2, 4),
    new Circle(5)
];

foreach ($objects as $object) {
    if ($object instanceof  CalculateSquare) {
        echo 'Объект класса ' . get_class($object) . ' реализует интерфейс CalculateSquare.' . ' Площадь :' . $object->calculateSquare();

    } else {
        echo 'Объект класса ' . get_class($object) . ' не реализует интерфейс CalculateSquare';
    }echo '<br>';
}

// класс Rectangle интерфейс CalculateSquare не реализует




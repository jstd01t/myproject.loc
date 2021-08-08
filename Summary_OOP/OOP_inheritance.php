<?php

// Mодификаторы доступа, их влияние на методы и свойства:

// private – доступны только внутри этого класса, недоступны в классах-наследниках;
// protected – доступны внутри этого класса и всем классам-наследникам. При этом недоступны извне;
// public – доступны как внутри объектов класса, так и снаружи – можем напрямую обращаться к ним извне. Доступны
// классам-наследникам.

// Cоздаем родительский класс

class Post
{
    protected $title;
    protected $text;

    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(): void        // void - значит что функция ничего не возвращает
    {
        $this->title = $title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(): void
    {
        $this->text = $text;
    }
}

/*
 * Неужели, для того чтобы сделать класс урока с домашкой нам нужно копировать весь этот код в новый класс Lesson,
а затем добавлять новое свойство homework и добавлять геттер и сеттер?
Оказывается – нет. Благодаря наследованию, разумеется. Как это работает? Да проще простого!
Класс может унаследовать от другого класса свойства и методы. Делается это при помощи ключевого слова extends
*/

// родительский класс (Post) может быть только один, доступны свойства и методы родительского класса, объявленные
// как public и protected, privat не наследуются

/*
class Lesson extends Post
{
    protected $title;
    protected $text;
    private $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }

    public function setHomework(string $homework): void
    {
        $this->homework = $homework;
    }

}

$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');

echo 'Название урока : ' . $lesson->getTitle();

*/

// Как видим, всё прекрасно работает.

// Все public-свойства и методы, то есть то, что позволяет нам напрямую взаимодействовать с объектами извне, называются
// интерфейсом класса. Это, опять-таки, относится к инкапсуляции.

//Если присмотреться к классам Post и Lesson, то можно заметить некоторое дублирование кода в конструкторе. Мы и там и
// там выполняем одинаковые действия для свойств title и text. Было бы неплохо от этого избавиться, воспользовавшись
// в Lesson уже готовым функционалом из Post. Для этого мы можем вызвать родительский конструктор в конструкторе
// дочернего класса. Делается это при помощи ключевого слова parent и двойного двоеточия.

class Lesson extends Post
{
    private $homework;
    public function __construct(string $title, string $text, string $homework)
    {
        parent :: __construct($title, $text);
        $this->homework = $homework;
    }
}

$lesson = new Lesson('Заголовок', 'Текст', 'Домашка');
var_dump($lesson);

//Обратите внимание, что если у родительского класса есть метод с модификатором public/protected, который работает со
// свойствами или методами с модификатором private, то используя этот метод извне или в дочерних классах мы будем иметь
// доступ к приватным свойствам через этот публичный метод.

class PaidLesson extends Lesson # создадим еще один экземпляр наследующий class Lesson
{
    public $price;

    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent:: __construct($title, $text, $homework);
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(): void
    {
        $this->price = $price;
    }
}

$lesson = new Lesson('заголовок', 'статья', 'домашка');
var_dump($lesson);

$lesson2 = new PaidLesson(
    'Урок о наследовании в PHP',
    'Лол, кек, чебурек',
    'Ложитесь спать, утро вечера мудренее',
    '99.90'
);
var_dump($lesson2);
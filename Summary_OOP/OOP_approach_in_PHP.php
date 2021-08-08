<?php

class User
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
}

class Article
{
    private $title;
    private $text;
    private $author;

    public function __construct(string $title, string $text, User $author) {
    // в PHP можно указывать в качестве типов и объекты! (type-hinting)
        $this->text = $text;
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
}

class Cat
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

}

$author = new User('Иван');
$article = new Article('Заголовок', 'Текст', $author);


var_dump($article);

echo 'Имя автора: ' . $article->getAuthor()->getName();

//Благодаря тому, что мы можем проверять типы передаваемых переменных, мы можем гарантировать,
// что автором статьи, например, не является кот.
$cat = new Cat('Барсик');
// $article = new Article('Заголовок', 'Текст', $cat); // error!!!


class Admin extends User
{

}

$author = new Admin('Peter');
$article = new Article('Заголовок', 'Текст', $author);
// Такой код корректно отработает, потому что Admin – это тоже User.

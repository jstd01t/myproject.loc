<?php

//Трейты в PHP: https://webshake.ru/post/treyty-v-php


trait SayYourClassTrait
{
    public function sayYourClass(): string
    {
        return 'My class is ' . self::class;
    }
}

interface ISayYourClass
{
    public function sayYourClass(): string;
}

class Man implements ISayYourClass
{
    use SayYourClassTrait;
}

class Box implements ISayYourClass
{
    use SayYourClassTrait;
}

$man = new Man();
$box = new Box();

echo $man->sayYourClass();
echo $box->sayYourClass();
echo Box::class;
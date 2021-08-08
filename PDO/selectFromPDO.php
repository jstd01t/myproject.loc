<?php

// ВЫБОРКА ИЗ БД С ПОМОЩЬЮ PHP
// Давайте теперь прочитаем данные, которые мы записали. Схема та же, только подготавливаем SELECT-запрос.

$dbh = new \PDO('mysql:host=localhost;dbname=my_db;', 'root', '');
// Первым делом после подключения стоит задать кодировку
$dbh->exec('SET NAMES UTF8');

//Подготавливает SQL-запрос к БД
$stm = $dbh->prepare('SELECT * FROM `users`');
$stm->execute();
$allUsers = $stm->fetchAll(); // Возвращает массив, содержащий все строки результирующего набора

var_dump($allUsers);
?>

// сделаем теперь по красоте

<table border="1">
    <tr><td>id</td><td>Имя</td><td>Email</td></tr>
    <?php foreach ($allUsers as $user): ?>
    <tr>
        <td><?= $user['id']?></td>
        <td><?= $user['name']?></td>
        <td><?= $user['email']?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
/*# Если в SELECT-запросе нужно добавить какие-то параметры, то делается это аналогично:
...
$stm = $dbh->prepare('SELECT * from `users` WHERE name=:name');
$stm->bindValue('name', 'Ваня');
$stm->execute();
$allUsers = $stm->fetchAll();
...
*/?>




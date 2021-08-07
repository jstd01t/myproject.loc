<?php
// затираем куки если не указываем аргументы функции
setcookie('login');
setcookie('password');
header('Location: /albumIndex.php');
?>


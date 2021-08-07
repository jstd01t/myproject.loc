<?php
if (!empty($_POST)) {
    require __DIR__ . '/authCookies.php';
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/'); // 0 - время существования до окончания сессии
        setcookie('password', $password, 0, '/'); // '/' - путь к директории на сервере, из которой будут доступны куки
        // (в данном случае куки будут доступны во всем домене)
        header('Location: /indexCookies.php'); // перед этой функциейне должно быть html-тегов, пробелов, пустых строк и т.д.
    } else {
        $error = 'Authorization is denied';
    }
}
?>
<html>
<head>
    <title>Form of Authorization</title>
</head>
<body>
<?php if (isset($error)): ?>
    <span style="color: red">
    <?= $error ?>
</span>
<?php endif; ?>
<form action="../index.php" method="post">
    <label for="login">Login</label><input name="login" type="text">
    <br>
    <label for="password">Password</label><input name="password" type="password">
    <br>
    <input type="submit" value="Log In">

</form>
</body>
</html>
<?php

$login = !empty($_POST['login']) ? $_POST['login'] : '';
$password = !empty($_POST['password']) ? $_POST['password'] : '';

$isAuthorization = false;

if ($login === 'admin' && $password === '1234') {
    $isAuthorization = "Authorisation is successful";
} elseif ($login !== 'admin') {
    $isAuthorization = "Login is not valid";
} else {
    $isAuthorization = "Password is not valid";
}
/*
// Using match
$isAuthorization = match (true){
    ($login !== 'admin') => 'Login is not valid',
    ($password !== 'Pa$$w0rd') => 'Password is not valid',
    default => 'Authorisation is successful'
};*/

?>

<html>
<head>
    <title>Result of authorization</title>
</head>
<body>
<?= $isAuthorization ?>
<a href="scratch.php"> <input type="submit" value="back"></a>
</body>
</html>

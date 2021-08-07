<?php
require __DIR__ . '/authCookies.php';
$login = getUserLogin();
?>

<html>
<head>
    <title>Main Page</title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="../index.php">Authorization</a>
<?php else: ?>
    <h2>Hello, <?= $login ?> !</h2>
    <br>
    <a href="../index.php">Log out</a>
<?php endif; ?>
</body>
</html>

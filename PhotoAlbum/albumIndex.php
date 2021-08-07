<html>
<head>
    <title>Photo Album</title>
</head>
<body>
<?php
require __DIR__ . '/albumAuth.php';
$login = getUserLogin();
$files = scandir(__DIR__ . '/AlbumUploads');
$links = [];
foreach ($files as $file) {
    if ($file === '.' || $file === '..') {
        continue;
    }
    $links[] = 'http://myproject.loc/AlbumUploads/' . $file;
}
foreach ($links as $link): ?>
    <a href="<?= $link ?>"> <img src="<?= $link ?>" height="80px"></a>
<?php endforeach; ?>
<br>
<?php if ($login === null): ?>
    <h4>To upload photos you must log in</h4>
    <a href="albumLogin.php">Authorization</a>
<?php else: ?>
    <h2>Hello, <?= $login ?> !</h2>
    <br>
    <a href="albumUpload.php">Upload your photos</a>
    <br>
    <a href="../albumLogout.php">Log out</a>
<?php endif; ?>
</body>
</html>


<?php

require __DIR__ . '/albumAuth.php';
$login = getUserLogin();

//  проверка на наличие в суперглобальном массиве инф-ии по загружаемому файлу с <input (это временный файл)
if (!empty($_FILES['attachment'])) {

    $file = $_FILES['attachment'];
    $srcFileName = basename($_FILES['attachment']['name']);
    // basename() может предотвратить атаку на файловую систему;
    $srcFileSize = $_FILES['attachment']['size'];
    $filePath = $_FILES['attachment']['tmp_name'];
    // директория к временному образу файла на сервере
    $newFilePath = __DIR__ . '/Uploads/' . $srcFileName;
    // назначение директории для загрузки
    $fileError = $_FILES['attachment']['error'];

    $allowedExtension = ['png', 'jpg', 'gif'];
    $extensions = pathinfo($srcFileName, PATHINFO_EXTENSION);

    if ($fileError == !UPLOAD_ERR_OK) {
        // тут можно задать вывод известных возвращаемых ошибок:
        $error = [
            UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
            UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
            UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
            UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
            UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
        ];
        // Задаем неизвестную ошибку
        $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
        // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
        $outputMessage = isset($error[$fileError]) ? $error[$fileError] : $unknownMessage;
        // Выведем название ошибки
        die($outputMessage);
    }
    $image = getimagesize($filePath);
    // получение информации о картинке, раньше переменную не поставил, т.к.
    // при ошибке загрузки выдает фатальную ошибку и не выполняется вывод сообщений
    // по ошибкам сверху
    var_dump(getimagesize($filePath));
    if (file_exists($newFilePath)) {
        $error = 'Файл с таким именем уже существует';

    } elseif ($srcFileSize > 8 * 1024 * 1024) {
        // проверка по объему файла (макс объем также можно задавать в HTML форме, но php предотвратит обход через URL
        $error = 'Размер файла выше допустимого (8Мб)';

    } elseif (!in_array($extensions, $allowedExtension)) {
        // проверка расширения, чтоб не загрузили php-вирус
        $error = 'Разрешено загружать только изображения!';

    } elseif ($image[0] >= 1600 || $image[1] >= 1100) {
        $error = 'Недопустимое разрешение изображения';

    } elseif (!move_uploaded_file($filePath, $newFilePath)) {
        $error = 'Ошибка при загрузке файла';
        // функция перемещения (путь до временного файла, путь по которому его сохранить) возвращает :bool
        // функция делает проверку, что файл действительно является временным загруженным файлом, а не чем то еще!!!!
        // другие функции для копирования не использовать (у них нет проверки)!!!

    } else {
        $result = 'http://myproject.loc/AlbumUploads/' . $srcFileName;
    }
}
?>


<html>
<head>
    <title>Загрузка файлов</title>
</head>
<body>
<?php if ($login === null): ?>
    <a href="albumLogin.php">Log in</a>
<?php else: ?>
<br>
<a href="./albumLogout.php">Log out</a>
<br>
<?php if (!empty($error)): ?>
    <span style="color: red"><?= $error ?></span>
<?php elseif (!empty($result)): ?>
    <span style="color: darkgreen;"><?= $result ?></span>
<?php endif; ?>
<form action="./albumUpload.php" method="post" enctype="multipart/form-data">

    <input type="file" name="attachment">
    <input type="submit">
    <?php endif; ?>
</form>
</body>
</html>
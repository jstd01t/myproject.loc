<?php

// Получить данные POST-запроса, и убедиться, что переданный текст не пустой.
// Дозаписать в конец файла текст feedback`a. При этом перед текстом следует добавить дату и время создания записи.
// !!! Папку для размещения текстового файла feedback.txt для приватности надо размещать отдельно вне проекта.
// Для работы кода проверьте директорию и папку для фидбека.

$result = null;
$text = $_POST['text'] ?? '';
$email = $_POST['email'] ?? '';
if (!empty($text) && !empty($email)) {
    $datetime = date(DATE_ATOM);
    // константа, содержащая строку "Y-m-d\TH:i:sP"
    // !!! делаем так, чтобы file_put_contents возвращала тип boolean, для этого сравниваем результат с false
    // !!! если файла нет, то он будет создан, если флаг FILE_APPEND не указан, то файл будет заменен на новый.
    $isWrote = file_put_contents(
            __DIR__ . '/../private/feedback.txt',
            $datetime . PHP_EOL . $text . PHP_EOL . $email . PHP_EOL,
        FILE_APPEND
    ) !== false;
    if ($isWrote === false) {
        $result = 'Не удалось отправить сообщение, попробуйте еще раз';
    } else {
        $result = 'Ваше сообщение успешно отправлено!';
    }
}


?>
<html>
<head>
    <title> Обратная связь</title>
</head>
<body>
<div style="text-align: center">
    <h1>Форма обратной связи</h1>
    <?php if ($result != null): ?>
    <div><b><?= $result ?></b></div>
    <?php endif; ?>
    <form action="feedback.php" method="post">
        <label for="text">Введите ваш текст</label><br>
        <textarea name="text" id="text" cols="55" rows="5"></textarea><br>
        <label style="color: red" for="email">для обратной связи укажите свой email:</label><br>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Отправить">
    </form>
</div>
</body>
</html>

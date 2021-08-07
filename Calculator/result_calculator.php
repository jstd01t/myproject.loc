<?php
$result = include __DIR__ . '/calc_calculator.php';
?>

<html>
<head>
    <title>Result</title>
</head>
<body>
<form action="result_calculator.php" method="get">
    <h1>Calculator</h1>
    <h2>Result of calculating:</h2>
    <input type="text" name="number1">
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="*">*</option>
    </select>
    <input type="text" name="number2">
    <input type="submit" value="GO!">
    <br>
    <h2><?= $result ?></h2>
</form>
</body>
</html>

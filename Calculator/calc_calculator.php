<?php
if (empty($_GET['number1']) || (empty($_GET['number1']))) {
    return 'you haven`t entered all numbers';
}
if (empty($_GET['operation'])) {
    return 'an operation hasn`t been selected';
}
if (!filter_input(INPUT_GET, 'number1', FILTER_VALIDATE_FLOAT)) {
    return 'you should enter a number';
};
$number1 = $_GET['number1'];
$number2 = $_GET['number2'];
$operation = $_GET['operation'];
$expression = $number1 . $_GET['operation'] . $number2 . '=';
$calculating = match ($_GET['operation']) {
    '+' => $number1 + $number2,
    '-' => $number1 - $number2,
    '*' => $number1 * $number2,
    '/', $number2 === 0 => 'division by zero is prohibited',
    '/' => $number1 / $number2,
    default => 'the operation is not defined'
};
$result = $expression . $calculating;
return $result;





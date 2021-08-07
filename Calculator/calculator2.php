<html>
<head>
    <title>Calculator</title>
</head>
<body>
<form action="/result_calculator.php" method="get">
    <h1>Calculator</h1>
    <h2>Enter your numbers and choose action</h2>
    <input type="text" name="number1">
    <select name="operation">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="/">/</option>
        <option value="*">*</option>
    </select>
    <input type="text" name="number2">
    <input type="submit" value="GO!">
</form>
</body>
</html>

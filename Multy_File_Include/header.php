<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>example</title>
    <style>
        table, td {
            border: solid black 2px;
            border-collapse: collapse;
        }
        #layout {
            width: 800px;
            margin: auto;
        }
        #layout td {
            padding: 20px;
        }
        #sidebar {
            width: 200px;
        }
    </style>
</head>
<body>
<table id="layout">
    <tr>
        <td colspan="2"><?=$header?></td>
    </tr>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form-container {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <ul>
        <li>Code : <?= $code; ?></li>
        <li>Version : <?= $version ;?></li>
        <li>Locked : <?= $locked ;?></li>
        <li>Env :<?= $env ;?></li>
        <li>TimestampUTC :<?= $timestampUtc ;?></li>
        <li>TimeZone :<?= $timezone ;?></li>
        <li>DateTime :<?= $datetime ;?></li>
    </ul>
    <a href="/homeJSON">Voir JSON</a>
    <a href="/Contact">CRUD Contact</a>
</body>
</html>
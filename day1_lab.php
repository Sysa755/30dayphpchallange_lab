<?php
$developer =[
    'name' => 'Nimrod',
    'challange' => 'backend php',
    'daily_hours' =>'1.5',
    'total_days' => '30',
    'is_ready' => true
];
$total_hours = $developer['daily_hours'] * $developer['total_days'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello,<?= $developer["name"] ?></h1>
    <p><strong>Challange</strong>: <?= $developer["challange"] ?></p>
    <p><strong>Daily Hours</strong>: <?= $developer["daily_hours"] ?></p>
    <p><strong>Total Hours</strong>: <?= $total_hours ?></p>
    <p><strong>Is Ready</strong>: <?= $developer["is_ready"] ? "Yes" : "No" ?></p>
    <h2>Raw Array Inspection</h2>
    <pre> <?php var_dump($developer);?> </pre>
</body>
</html>
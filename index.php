<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

$url = "http://lab.vntu.org/api-server/lab8.php?user=student&pass=p@ssw0rd";
$json = file_get_contents($url);

$data = json_decode($json);

$people = [];
if ($data && is_iterable($data)) {
    foreach ($data as $group) {
        if (is_iterable($group)) {
            foreach ($group as $person) {
                $people[] = $person;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Список людей</title>
    <style>
        table { border-collapse: collapse; width: 90%; margin: 20px auto; font-family: sans-serif; }
        th, td { border: 1px solid #000; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Список людей</h2>

<table>
    <tr>
        <th>ID</th> <th>Ім’я</th> <th>Ранг</th> <th>Корабель</th> </tr>

    <?php $i = 1; foreach ($people as $person): ?>
        <?php 
          
            $v = array_values((array)$person); 
           
        ?>
        <tr>
            <td><?= $i++ ?></td> <td><?= htmlspecialchars($v[0] ?? '') ?></td> <td><?= htmlspecialchars($v[2] ?? '') ?></td> <td><?= htmlspecialchars($v[3] ?? '') ?></td> </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>Aprendiendo PHP</h1>
    <?php
        $i = 0;
        $cars = [
            'Toyota' => [
                'Corolla',
                'Yaris',
                'Hilux'
            ],
            'Nissan' => [
                'Sentra',
                'Versa',
                'X-Trail'
            ]
        ];
        $name = 'Carlos Castañeda';
        //Key => Value
        foreach ($cars as $brand => $models) {
            echo "<h2>$brand</h2>";
            foreach ($models as $model) {
                echo "<p>$model</p>";
            }
        }
        // for ($i = 0; $i < sizeof($cars); $i++) {
        //     echo "<p>Arreglo[$i]:  {$cars[$i]} </p>";
        // }
        echo '<h2>Hola ' . $name . ' desde PHP</h2>';
    ?>

    <h1>Ejercicio 1</h1>
    <?php
        $arreglo = [
            'KeyStr1'=> 'lado',
            0 => 'ledo',
            'KeyStr2' => 'lido',
            1 => 'lodo',
            2 => 'ludo'
        ];
        foreach ($arreglo as $key => $value) {
            echo "$value, ";
        }
        echo '<br>decirlo al revés lo dudo <br>';
        foreach (array_reverse($arreglo) as $value) {
            echo "$value, ";
        }
        echo '<br>Que trabajo me ha costado <br>';
    ?>
</body>
</html>
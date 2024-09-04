<?php

    //echo 'Antes de importar los archivos<br>';
    //Importar otros archivos de PHP
    //require 'ContactController.php';
    //require_once 'ContactController.php';
    //include 'ContactController.php';
    //include_once '../src/Controllers/ContactController.php';
    //echo 'Después de importar los archivos<br>';
    require_once '../vendor/autoload.php';
    use Agenda\Controllers\ContactController;
    $contactController = new ContactController('../contacts.json');
    $contacts = $contactController->readJsonFile();
    /*$contacts = [
        [
            'name' => 'Pepe',
            'phone' => '3100000000'
        ],
        [
            'name' => 'Juan',
            'phone' => '3211111111'
        ]
    ];*/
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    //var_dump($file_content);
        //var_dump($contacts);
        //print_r($contacts);
    ?>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($contacts as $index => $contact) {
                        echo "<tr>";
                            echo "<th scope='row'>" . ($index + 1) . "</th>";
                            echo "<td>" . $contact['name'] . "</td>";
                            echo "<td>{$contact['phone']}</td>";
                            echo "<td>". ($contact['email'] ?? '') . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn btn-success">Create new contact</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
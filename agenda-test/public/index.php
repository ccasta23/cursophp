<?php

require_once '../vendor/autoload.php';

use Agenda\Controllers\ContactController;

$contactController = new ContactController('../contacts.json');
$contacts = $contactController->jsonHandler->readJsonFile();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Agenda de Contactos</h1>
        <a href="add.php" class="btn btn-primary mb-3">Agregar Contacto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $index => $contact): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['name']); ?></td>
                    <td><?= htmlspecialchars($contact['phone']); ?></td>
                    <td><?= htmlspecialchars($contact['email']); ?></td>
                    <td>
                        <a href="edit.php?index=<?= $index ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?index=<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este contacto?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

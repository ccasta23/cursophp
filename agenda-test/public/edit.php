<?php

require_once '../vendor/autoload.php';

use Agenda\Controllers\ContactController;

$contactController = new ContactController('../contacts.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $contactController->editContact($index, $name, $phone, $email);

    header('Location: index.php');
    exit;
}

$index = $_GET['index'];
$contacts = $contactController->jsonHandler->readJsonFile();
$contact = $contacts[$index] ?? null;

if (!$contact) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Editar Contacto</h1>
        <form action="edit.php" method="POST">
            <input type="hidden" name="index" value="<?= $index ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($contact['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>

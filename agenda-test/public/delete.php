<?php

require_once '../vendor/autoload.php';

use Agenda\Controllers\ContactController;

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    $contactController = new ContactController('../contacts.json');
    $contactController->deleteContact($index);
}

header('Location: index.php');
exit;

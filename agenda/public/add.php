<?php
//require_once '../src/Controllers/ContactController.php';
//require_once '../src/Models/Contact.php';
require_once '../vendor/autoload.php';
use Agenda\Controllers\ContactController;
use Agenda\Models\Contact;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $contactController = new ContactController('../contacts.json');
        $contact = new Contact($name, $phone, $email);
        $contactController->add($contact);
        header('Location: index.php');
    }
?>
<form method="POST">
    <label>Name</label>
    <input type="text" name="name" id="name">
    <br>
    <label>Phone</label>
    <input type="text" name="phone" id="phone">
    <br>
    <label>Email</label>
    <input type="email" name="email" id="email">
    <br>
    <button id="add">Add</button>
</form>
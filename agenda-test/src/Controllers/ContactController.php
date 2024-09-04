<?php
namespace Agenda\Controllers;

use Agenda\Models\Contact;
use Agenda\Utils\JsonHandler;
use Agenda\Utils\EmailSender;

class ContactController
{
    public JsonHandler $jsonHandler;
    private EmailSender $emailSender;

    public function __construct(string $jsonFile)
    {
        $this->jsonHandler = new JsonHandler($jsonFile);
        $this->emailSender = new EmailSender();
    }

    public function addContact(string $name, string $phone, string $email): bool
    {
        $contacts = $this->jsonHandler->readJsonFile();
        
        $contact = new Contact($name, $phone, $email);
        $contacts[] = $contact->toArray();
        if ($this->jsonHandler->writeJsonFile($contacts)) {
            $this->emailSender->sendNotificationEmail($contact);
            
            return true;
        }
        
        return false;
    }

    public function editContact(int $index, string $name, string $phone, string $email): bool
    {
        $contacts = $this->jsonHandler->readJsonFile();

        if (isset($contacts[$index])) {
            $contacts[$index] = [
                'name' => $name,
                'phone' => $phone,
                'email' => $email
            ];

            return $this->jsonHandler->writeJsonFile($contacts);
        }

        return false;
    }

    public function deleteContact(int $index): bool
    {
        $contacts = $this->jsonHandler->readJsonFile();

        if (isset($contacts[$index])) {
            unset($contacts[$index]);
            $contacts = array_values($contacts); // Reindexar array
            return $this->jsonHandler->writeJsonFile($contacts);
        }

        return false;
    }
}

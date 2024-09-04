<?php
// src/Models/Contact.php

namespace Agenda\Models;

class Contact
{
    private string $name;
    private string $phone;
    private string $email;

    public function __construct(string $name, string $phone, string $email)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email
        ];
    }
}

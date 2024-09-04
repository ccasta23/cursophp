<?php
namespace Agenda\Models;

class Contact {
    //Atributos
    private string $name;
    private string $phone;
    private string $email;

    //Magic Methods
    public function __construct(
        string $name, string $phone, string $email
        ) {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    //Getters
    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    //Setters
    public function setName(string $name) {
        $this->name = $name;
    }

    public function setPhone(string $phone) {
        $this->phone = $phone;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function toArray() {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email
        ];
    }
}
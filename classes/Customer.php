<?php

require_once 'Person.php';

Class Customer extends Person
{
    public string $companyName;
    public string $companyEmail;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email,
        string $companyName,
        string $companyEmail,
    )
    {
        parent::__construct($firstName, $lastName, $email);
        $this->companyName = $companyName;
        if ($this->validateEmail($companyEmail)) {
            $this->companyEmail = $companyEmail;
        } else {
            throw new Exception('Invalid company email.');
        }
    }
}
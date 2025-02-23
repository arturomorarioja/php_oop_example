<?php

Class Person
{
    public string $firstName;
    public string $lastName;
    private string $email;

    public function __construct(
        string $firstName,
        string $lastName,
        string $email
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        if ($this->validateEmail($email)) {
            $this->email = $email;
        } else {
            throw new Exception('Invalid email format.');
        }
    }

    public function __set(string $property, mixed $value)
    {
        if ($property === 'email' && !$this->validateEmail($value)) {
            throw new Exception('Invalid email format.');
        }
        $this->$property = $value;
    }

    public function __get(string $property): mixed
    {
        if ($property === 'email') {
            return $this->email;
        }
    }

    protected function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
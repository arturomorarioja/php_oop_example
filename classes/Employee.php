<?php

require_once 'Person.php';

Class Employee extends Person
{
    public string $employmentDate;

    public function __construct(        
        string $firstName,
        string $lastName,
        string $email,
        string $employmentDate
    )
    {
        parent::__construct($firstName, $lastName, $email);
        if ($this->validateDate($employmentDate)) {
            $this->employmentDate = $employmentDate;
        } else {
            throw new Exception('Invalid date format.');
        }
    }

    private function validateDate(string $date): bool
    {
        return 
            (DateTime::createFromFormat('Y-m-d', $date)) && 
            ($date === DateTime::createFromFormat('Y-m-d', $date)->format('Y-m-d'));
    }
}
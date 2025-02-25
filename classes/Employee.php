<?php

require_once 'Person.php';

Class Employee extends Person
{
    private string $employmentDate;
    private float $salary;

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

    public function __set(string $property, mixed $value)
    {
        switch ($property) {
            case 'employmentDate':
                if ($this->validateDate($value)) {
                    $this->$property = $value;
                } else {
                    throw new Exception('Invalid date format.');
                }
                break;
            case 'salary':
                $this->$property = $value;
                break;
            default:
                throw new Exception('Invalid property.');
        }
    }

    public function __get(string $property): mixed
    {
        switch ($property) {
            case 'employmentDate':
                return $this->employmentDate;
            case 'salary':
                return null;
            default:
                throw new Exception('Invalid property.');
        }
    }

    private function validateDate(string $date): bool
    {
        return
            (DateTime::createFromFormat('Y-m-d', $date)) &&
            ($date === DateTime::createFromFormat('Y-m-d', $date)->format('Y-m-d'));
    }
}
<?php

require_once 'classes/Person.php';
require_once 'classes/Employee.php';
require_once 'classes/Customer.php';

$peter = new Person('Peter', 'Jansen', 'pj@mail.com');

echo $peter->firstName;

$peter->lastName = 'Hansen';
echo $peter->lastName;

echo '<hr>';

$jane = new Employee('Jane', 'Johnson', 'jj@mail.com', '2016-02-29');
echo $jane->firstName;
echo $jane->employmentDate;

echo '<hr>';

$jon = new Customer('Jon', 'Harris', 'jh@mail.com', 'Lego', 'jh@lego.dk');
echo $jon->firstName;
echo $jon->companyEmail;
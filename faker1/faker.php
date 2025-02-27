<?php
require_once 'vendor/autoload.php'; // Make sure you have the Faker library

$faker = Faker\Factory::create('fil_PH'); // Localized to the Philippines


$employees = [];
$offices = [];
$transactions = [];


for ($i = 1; $i <= 200; $i++) {
    $employees[] = [
        'id' => $i,
        'lastname' => $faker->lastName(),
        'firstname' => $faker->firstName(),
        'office_id' => $faker->numberBetween(1, 50), // Assuming office IDs will be from 1 to 50
        'address' => $faker->address(),
    ];
}


for ($i = 1; $i <= 50; $i++) {
    $offices[] = [
        'id' => $i,
        'name' => $faker->company(),
        'contactnum' => $faker->phoneNumber(),
        'email' => $faker->safeEmail(),
        'address' => $faker->address(),
        'city' => $faker->city(),
        'country' => 'Philippines',
        'postal' => $faker->postcode(),
    ];
}


for ($i = 1; $i <= 500; $i++) {
    $dateLog = $faker->dateTimeBetween('-1 year', 'now'); // No future dates allowed
    $transactions[] = [
        'id' => $i,
        'employee_id' => $faker->numberBetween(1, 200), // Random employee ID
        'office_id' => $faker->numberBetween(1, 50), // Random office ID
        'datelog' => $dateLog->format('Y-m-d H:i:s'), // Format date
        'action' => $faker->word(),
        'remarks' => $faker->sentence(),
        'documentcode' => $faker->uuid(),
    ];
}


echo json_encode(['employees' => $employees, 'offices' => $offices, 'transactions' => $transactions]);
<?php

use Bhimmu\Php84\Entities\User;

require __DIR__ . '/vendor/autoload.php';

$user = new User(
    userName: "VARCHAR(35) PRIMARY KEY",
    password: "VARCHAR(255)",
    salary: "INT"
);

$reflection = new ReflectionClass($user);

$properties = $reflection->getProperties();

$raw_query = 'CREATE TABLE ' . $reflection->getShortName() . '(';

foreach ($properties as $key => $property) {
    if ($key < count($properties) - 1) {
        $raw_query .= $property->getName() . ' ' . $property->getValue($user) . ', ';
    } else {
        $raw_query .= $property->getName() . ' ' . $property->getValue($user) . ')';
    }
}

dd($raw_query);
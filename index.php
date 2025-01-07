<?php

use Bhimmu\Php84\Entities\User;

require __DIR__ . '/vendor/autoload.php';

$reflection = new ReflectionClass(User::class);

dd($reflection);

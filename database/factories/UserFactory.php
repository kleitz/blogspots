<?php
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
	$name = $faker->name;
    return [
        'email' => $faker->email,
        'displayName' => $name,
        'firstName' => substr($name, 0, strpos($name, ' '));
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
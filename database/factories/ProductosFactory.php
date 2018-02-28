<?php

use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(App\Productos::class, function (Faker $faker) {

    $nombre = $faker->name;
    $precio = $faker->numberBetween(1, 10000)."€";
    $stock = $faker->numberBetween(1, 10000)."Und";
    $sabor = $faker->word;
    $caracteristicas = $faker->realText(255);
    $time1 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $time2 = Carbon::createFromTimestamp($faker->dateTimeThisDecade()->getTimestamp());
    $created_at = ($time1 < $time2) ? $time1 : $time2;
    $updated_at = ($time1 > $time2) ? $time1 : $time2;


    return [
        'nombre' => $nombre,
        'precio' => $precio,
        'stock' => $stock,
        'sabor' => $sabor,
        'caracteristicas' => $caracteristicas,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];
});
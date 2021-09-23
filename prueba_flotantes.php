<?php

function recalcular(float $y, float $z): float
{
    return 108 - ((815 - (1500 / $z)) / $y);
}

function floatpt(int $N): array
{
    $x = [4, 4.25]; //valores redondeados manualmente

    for ($i = 2; $i <= $N; $i++) {
        $x = [...$x, recalcular($x[$i - 1], $x[$i - 2])];
    }

    return $x;
}

function fixedpt(int $N): array
{
    $x  = [(float) 4, (float) 17 / (float) (4)]; //valores que deben mantenerse con la mayoria de decimales

    foreach (range(2, $N + 1) as $i) {
        $x = [...$x, recalcular($x[$i - 1], $x[$i - 2])];
    }

    return $x;
}


$n = 30;
$norm = floatpt(30);
$fix = fixedpt(30);

echo "\n";
echo "Se ejecutara una prueba de presicion de flotantes hasta un limite de 30 iteraciones\n";
echo "Basado en el siguiente articulo: https://scipython.com/blog/mullers-recurrence/\n";

echo "Iteracion => Normal\t\t: Corregido \n";
for ($i = 0; $i <= $n; $i++) {
    printf("[ %d ] \t  => %f   \t: %f \t\n", $i, $norm[$i], $fix[$i]);
}

echo "\n";
echo "En procesador de 64 bits, php obedece el estándar IEEE 754 para el manejo de punto flotante\n";
echo "\n";

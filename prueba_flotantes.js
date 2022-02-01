function recalcular( y, z)
{
    return 108 - ((815 - (1500 / z)) / y);
}

function floatpt(N)
{
    let x = [4, 4.25]; //valores redondeados manualmente
    for (i = 2; i <= N; i++) {
        x = [...x, recalcular(x[i - 1], x[i - 2])];
    }
    return x;
}

function fixedpt(N)
{
    x  = [ 4, 17/4]; //valores que deben mantenerse con la mayoria de decimales

    for (i = 2;  i<= N; i++) {
        x = [...x, recalcular(x[i - 1], x[i - 2])];        
    }
    return x;
}

console.time("t1");
$n = 30;
$norm = floatpt(30);
$fix = fixedpt(30);

console.info("\n");
console.info("Se ejecutara una prueba de presicion de flotantes hasta un limite de 30 iteraciones\n");
console.info("Basado en el siguiente articulo: https://scipython.com/blog/mullers-recurrence/\n");

console.info("Iteracion => Normal\t\t: Corregido \n");
for ($i = 0; $i <= $n; $i++) {
    console.info("[ %d ] \t  => %f   \t: %f \t", $i, $norm[$i], $fix[$i]);
}

console.info("\n");
console.info("En procesador de 64 bits, php obedece el estándar IEEE 754 para el manejo de punto flotante\n");
console.info("\n");
console.timeEnd("t1");

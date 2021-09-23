<?php
echo "hola mundo\n";

echo "\n----------------------\n";
echo "Lista de parametros\n";
print_r($argv);

echo "\n----------------------\n";
if ($argc == 1) {
    $nombre = readline("Ingrese tú nombre: ");
    echo "Hola " . $nombre . "\n";
    echo "Otra forma de ingresar tu nombre, ejecuta: php hola.php <tu_nombre>";
} else {
    echo "Hola " . $argv[1];
}

echo "\n----------------------\n";
try {
    $gbd = new PDO('mysql:dbname=ramirez;host=localhost;', 'user', 'password');
    $salida = $gbd->query("SELECT * FROM users", PDO::FETCH_ASSOC);
    $i = 0;
    foreach ($salida as $key) {
        $i++;
        print_r($i . "\n");
        print_r($key);
    }
    print_r($i . "\n");
} catch (PDOException $e) {
    echo "Cambia los datos de conexión a DB a tu gusto";
} finally {
    echo "\n----------------------\n";
    echo "Tu Sistema operativo es: " . $_SERVER['OS'];
    echo  "\n";

    $pos = strpos($_SERVER['OS'], "Windows");
    if ($pos !== false)
        system("explorer.exe");
    else
        system("gedit");

    echo "\n----------------------\n";
    $cmd = readline("Ingrese un comando: ");
    echo "Tú comando fue: " . $cmd;
    system($cmd);

    echo "\n----------------------\n";
    $salida = shell_exec('php -v');
    $version = substr($salida, 4, 3);

    echo "Su version de php es: " . $version . "\n";

    if ($version >= 7.4)
        system("php prueba_flotantes.php");
    else
        echo "Para la última prueba necesita PHP 8 o superior";

    system("prueba_flotantes.exe");
}

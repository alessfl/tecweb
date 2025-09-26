<?php include("src/funciones.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1 -> variable (ej1)</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if (isset($_GET['ej1'])) {
            echo "<h3>R= " . esMultiploDe5y7($_GET['ej1']) . "</h3>";
        }
    ?>

    <h2>Ejercicio 2 -> variable (ej2)</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia</p>
    <?php
        if (isset($_GET['ej2'])) {
            echo generarSecuenciaImparParImpar();
        }
    ?>

    <h2>Ejercicio 3 -> variable (ej3)</h2>
    <p>Utiliza un ciclo while y do-while para encontrar el primer número aleatorio múltiplo de un número dado (por GET).</p>
    <?php
        if (isset($_GET['ej3'])) {
            echo primerNumeroEnteroDeWhile($_GET['ej3']) . "<br>";
            echo primerNumeroEnteroDeDoWhile($_GET['ej3']);
        }
    ?>


    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>
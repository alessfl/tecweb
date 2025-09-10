<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 5</title>
</head>
<body>
    <h2>Ejercicio 1 - variables</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar = 'valor de $_myvar';
        $_7var = 'valor de $_7var (empieza por _ luego dígito; permitido)';
        //myvar;       // Inválida
        $myvar =  'valor de $myvar';
        $var7 = 'valor de $var7';
        $_element1 = 'valor de $_element1';
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';
    ?>

    <h2>Ejercicio 2 — referencias</h2>
    <p>Asignar y luego reasignar referencias; mostramos el contenido antes y después.</p>

    <?php
    echo "<h3>a) Asignaciones iniciales y salida:</h3>\n";
    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a; // $c referencia a $a

    echo "<p> a: $a</p>";
    echo "<p> b: $b</p>";
    echo "<p> c: $c</p>";

    echo "<h3>b) Nuevas asignaciones:</h3>\n";
    $a = "PHP server"; // modifica la variable referenciada
    $b = &$a;          // ahora $b referencia a $a (pierde el dato 'MySQL')
    echo "<p> a: $a</p>";
    echo "<p> b: $b</p>";
    echo "<p> c: $c</p>";
    
    echo "<p><strong>Descripción de lo ocurrido:</strong> 
    En el segundo bloque, al cambiar <code>\$a</code> a <em>\"PHP server\"</em>, ese nuevo valor también se reflejó en <code>\$c</code> porque estaba enlazado a <code>\$a</code>. 
    Después, al hacer <code>\$b =& \$a</code>, la variable <code>\$b</code> dejó de tener su valor anterior (<em>\"MySQL\"</em>) y pasó a apuntar al mismo lugar que <code>\$a</code>. 
    Por eso, al final, las tres variables (<code>\$a</code>, <code>\$b</code> y <code>\$c</code>) muestran exactamente el mismo contenido: <em>\"PHP server\"</em>.
    </p>";
    ?>

    <h2>Ejercicio 3 — evolución y tipo de variables</h2>
    <?php
    $a = "PHP5";
    echo "<strong>1) <code>\$a = \"PHP5\"</code>:</strong>\n";
    echo "<p> -> a: $a</p>";

    $z = array();
    $z[] = &$a; // $z[0] referencia a $a
    echo "<strong>2) <code>\$z[] =& \$a</code></strong>\n<pre>";
    var_dump($z);
    echo "</pre>";

    $b = "5a version de PHP";
    echo "<strong>3) <code>\$b = \"5a version de PHP\"</code>:</strong>"; 
    echo "<p> -> b: $b</p>";

    $c = $b * 10;
    echo "<strong>4) <code>\$c = \$b * 10</code>:</strong>\n<pre>"; 
    var_dump($c); 
    echo "</pre>";

    $a .= $b; // concatenación, $a sigue siendo cadena
    echo "<strong>5) <code>\$a .= \$b</code> (concatenación):</strong>"; 
    echo "<p> -> a: $a</p>";

    $b *= $c; // $b se convierte en numérico (5) y multiplica por $c (50) -> 250
    echo "<strong>6) <code>\$b *= \$c</code>:</strong>"; 
    echo "<p> -> b: $b</p>";

    $z[0] = "MySQL"; 
    echo "<strong>7) <code>\$z[0] = \"MySQL\"</code> (sobrescribe la referencia):</strong>\n<pre>";
    var_dump($z);
    echo "</pre>";
    ?>

    <h2>Ejercicio 4 - Leer y mostrar los valores de las variables del ejercicio 3</h2>
    <?php
    echo "<h3>4) Usando <code>global</code> dentro de una función:</h3>\n";

    function leerConGlobal() {
        global $a, $b, $c, $z;
        echo "<pre>";
        var_dump($a, $b, $c, $z);
        echo "</pre>";
    }
    leerConGlobal();
    ?>


</body>
</html>
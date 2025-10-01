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
    Después, al hacer <code>\$b =&amp; \$a</code>, la variable <code>\$b</code> dejó de tener su valor anterior (<em>\"MySQL\"</em>) y pasó a apuntar al mismo lugar que <code>\$a</code>. 
    Por eso, al final, las tres variables (<code>\$a</code>, <code>\$b</code> y <code>\$c</code>) muestran exactamente el mismo contenido: <em>\"PHP server\"</em>.
    </p>";
    ?>

    <h2>Ejercicio 3 — evolución y tipo de variables</h2>
    <?php
    $a = "PHP5";
    echo "<p><strong>1) <code>\$a = \"PHP5\"</code>:</strong></p>\n";
    echo "<p> -> a: $a</p>";

    $z = array();
    $z[] = &$a; // $z[0] referencia a $a
    echo "<p><strong>2) <code>\$z[] =&amp; \$a</code></strong></p><pre>";
    echo htmlspecialchars(var_export($z, true));
    echo "</pre>";

    $b = "5a version de PHP";
    echo "<p><strong>3) <code>\$b = \"5a version de PHP\"</code>:</strong></p>"; 
    echo "<p> -> b: $b</p>";

    $c = $b * 10;
    echo "<p><strong>4) <code>\$c = \$b * 10</code>:</strong></p><pre>"; 
    var_dump($c); 
    echo "</pre>";

    $a .= $b; // concatenación, $a sigue siendo cadena
    echo "<p><strong>5) <code>\$a .= \$b</code> (concatenación):</strong></p>"; 
    echo "<p> -> a: $a</p>";

    $b *= $c; // $b se convierte en numérico (5) y multiplica por $c (50) -> 250
    echo "<p><strong>6) <code>\$b *= \$c</code>:</strong></p>"; 
    echo "<p> -> b: $b</p>";

    $z[0] = "MySQL"; 
    echo "<p><strong>7) <code>\$z[0] = \"MySQL\"</code> (sobrescribe la referencia):</strong></p><pre>";
    echo htmlspecialchars(var_export($z, true));
    echo "</pre>";
    ?>

    <h2>Ejercicio 4 - Leer y mostrar los valores de las variables del ejercicio 3</h2>
    <?php
    echo "<h4>4) Usando <code>global</code> dentro de una función:</h4>\n";

    function leerConGlobal() {
        global $a, $b, $c, $z;
        echo "<pre>";
        var_dump($a, $b, $c);
        echo htmlspecialchars(var_export($z, true));
        echo "</pre>";
    }
    leerConGlobal();
    ?>
        
    <h2>Ejercicio 5 — valor a las variables</h2>
    <?php
    $a = "7 personas";
    $b = (integer) $a; // convierte "7 personas" -> 7
    $a = "9E3";
    $c = (double) $a;  // "9E3" -> 9000.0 (notación científica)

    echo "<p> -> a: ", var_dump($a), "</p>";
    echo "<p> -> b: ", var_dump($b), "</p>";
    echo "<p> -> c: ", var_dump($c), "</p>";
    ?>

    <h2>Ejercicio 6 — valores booleanos</h2>
    <?php
    $a = "0";      
    $b = "TRUE";   
    $c = FALSE;
    $d = ($a OR $b);    
    $e = ($a AND $c);   
    $f = ($a XOR $b);   

    echo "<pre>";
    var_dump($a, $b, $c, $d, $e, $f);
    echo "</pre>";

    echo "<h4>Transformar booleanos con var_export()</h4>";
    echo "<p>Valor de c: " . var_export($c, true) . "<br />\n";
    echo "Valor de e: " . var_export($e, true) . "<br /></p>\n";
    ?>

     <h2>Ejercicio 7 — variable $_SERVER</h2>
    <?php
    echo "<pre>";
    echo "SERVER_SOFTWARE (servidor web): ";
    echo isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : "No disponible (CLI o entorno restringido)";
    echo "\n";

    echo "Versión de PHP (phpversion()): " . phpversion() . "\n";

    echo "Sistema operativo (php_uname): " . php_uname() . "\n";

    echo "Idioma del navegador (HTTP_ACCEPT_LANGUAGE): ";
    echo isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : "No disponible (depende del cliente/entorno)";
    echo "\n";
    echo "</pre>";
    ?>
    <p>
    <a href="https://validator.w3.org/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
    
  
</body>
</html>

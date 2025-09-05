<?php
include("encabezado.inc.php");  // abre <!DOCTYPE>, <html>, <head>, <body>
include("cuerpo.inc.php");      // solo contenido <h1>, <h2> ...
    require("cuerpo.html"); // solo contenido HTML
include("pie.inc.php");         // cierra <body>, </html>
?>

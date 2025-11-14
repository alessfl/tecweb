<?php
    class Cabecera {
        private $titulo;

        public function __construct($title){
            $this->titulo = $title;
        }

        public function graficar(){
            $estilo = 'text-align: center;';
            echo '<h1 style = "'.$estilo.'">'.$this->titulo.'</h1>';
        }

    }

    class Cuerpo {
        private $lineas = array();

        public function insertar_parrafo($linea){
            $this->lineas[] = $linea;
        }

        public function graficar(){
            for ($i = 0; $i < count($this->lineas); $i++){
                echo '<p>'.$this->lineas[$i].'</p>';
            }
        }
    }

    class Pie {
        private $mensaje;

        public function __construct($msj){
            $this->mensaje = $msj;
        }

        public function graficar(){
            $estilo = 'text-align: center;';
            echo '<h1 style = "'.$estilo.'">'.$this->mensaje.'</h1>';
        }
    }

    class Pagina {
        private $cabecera;
        private $cuerpo;
        private $pie;

        public function __construct($title, $msj){
            $this->cabecera = new Cabecera($title);
            $this->cuerpo = new Cuerpo();
            $this->pie = new Pie($msj);
        }

        public function insertar_cuerpo($linea){
            $this->cuerpo->insertar_parrafo($linea);
        }

        public function graficar(){
            $this->cabecera->graficar();
            $this->cuerpo->graficar();
            $this->pie->graficar();
        }
    }
?>
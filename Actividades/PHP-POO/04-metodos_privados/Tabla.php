<?php
class Tabla {
    private $matriz = array();
    private $filas;
    private $columnas;
    private $estilo;

    public function __construct($rows, $cols, $style) {
        $this->filas = $rows;
        $this->columnas = $cols;
        $this->estilo = $style;    
    }

    public function cargar($row, $col, $value) {
        $this->matriz[$row][$col] = $value;
    }

    private function inicio_tabla() {
        echo '<table style="'.$this->estilo.'">';
    }

    private function inicio_fila() {
        echo '<tr>';
    }

    private function mostrar_dato($row, $col) {
        echo '<td style ="'.$this->estilo. '">'.$this->matriz[$row][$col].'</td>';
    }

    private function fin_fila() {
        echo '</tr>';
    }

    private function fin_tabla() {
        echo '</table>';
    }

    public function graficar() {
        $this->inicio_tabla();
        for ($i = 0; $i < $this->filas; $i++) {
            $this->inicio_fila();
            for ($j = 0; $j < $this->columnas; $j++) {
                $this->mostrar_dato($i, $j);
            }
            $this->fin_fila();
        }
        $this->fin_tabla();
    }
}
?>
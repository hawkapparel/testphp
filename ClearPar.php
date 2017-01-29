<?php

class ClearPar{

    private $string = "";
    private $arr_char_accept = array("(", ")");


    public function __construct($string) {
        $this->string=$string;
    }

    public function build(){

        $str = $this->string;
        $cant =  substr_count($str, '()');
        return str_repeat("()", $cant);
    }

}

?>

<?php
    $string = "()())()";
    echo "La cadena de entrada es: " .  $string;
    echo "<br>";
    $cp = new ClearPar($string);
    echo "La cadena limpiada es: " . $cp->build(); 
    echo "<br>";
 ?>
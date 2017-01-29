<?php
class ChangeString{

    private $string = "";
    private $arr_alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");


    public function __construct($string) {
        $this->string=$string;
    }

    public function build(){

        $str = $this->string;
        $arr_str = str_split($str);

        foreach ($arr_str as $value) {
            if ( $this->check($value) ) {
                //Verificamos si el código assci del valor iterado es Z o z
                if ( ord($value) == 90 || ord($value) == 122 ) {
                    //Le restamos 25 al valor del código assci para obtener la primera letra del abecedario según si es mayuscula o minúscula
                    $value = chr( ord($value) - 25 );
                }else{
                    $value = chr( ord($value) + 1 );
                }
            }
            $new_arr .= $value;
        }
        return $new_arr;

    }

    public function check($character){

        if ( ctype_upper ( $character ) ) {
            $character = strtolower($character);
        }

        return in_array($character, $this->arr_alphabet);
    }

}

?>

<?php
    $string = "**Casa 52Z";
    echo "La cadena de entrada es: " .  $string;
    echo "<br>";
    $cs = new ChangeString($string);
    echo "La cadena convertida es: " . $cs->build(); 
    echo "<br>";
 ?>
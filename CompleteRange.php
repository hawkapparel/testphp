<?php

class CompleteRange{

    private $collection = array();


    public function __construct($collection) {
        $this->colecction=$collection;
    }

    public function build(){
        $col = $this->colecction;
        $firstel = reset($col);
        $lastel = end($col);
        $col_lenght = ($lastel - $firstel) + 1;
        $new_arr = null;

        if ( $col_lenght != count($col) ) {     
            for ($i=0; $i < $col_lenght; $i++) {
                $new_arr[$i] = $firstel;
                $firstel++;
            }

        }else{
            $new_arr = $col;
        }

        return $new_arr;
    }

}

?>

<?php
    $collect = array(55, 58, 60);
    echo "La colección inicial es: ";
    echo "<br>";
    print_r($collect);
    echo "<br>";
    $cr = new CompleteRange($collect);
    $arr = $cr->build();
    echo "La colección final es: ";
    echo "<br>";
    print_r($arr); 
    echo "<br>";
 ?>
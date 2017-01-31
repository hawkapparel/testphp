<?php
namespace repositories;
use models\Empleado as EmpleadoModel;

class Empleado
{
    private $data;
    
    public function __CONSTRUCT()
    {
        $jsonString = file_get_contents('employees.json');
        $this->data = json_decode($jsonString);
    }
    
    public function GetAll()
    {

        try {
            $response = $this->data;

            return $response;
        } 
        catch (Exception $e) {
            $e->getMessage();
            return $e;
        }
    }

    public function Get($email)
    {
        try {
            //return array_filter($this->data, "MatchId");

            return array_filter($this->data, function($v, $k){ 
                //return $v->email == 'foleyday@fanfare.com'; 
                return $v->email == 'foleyday@fanfare.com'; 
            }
                , ARRAY_FILTER_USE_BOTH);
        } 
        catch (Exception $e) {
            $e->getMessage();
            return $e;
        }
        
    }

}
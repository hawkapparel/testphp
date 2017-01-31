<?php
namespace repositories;
use models\Empleado as EmpleadoModel;
use Filter as filter;

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
            $info = $email;

            return array_filter($this->data, function($v, $k) use ($info){ 
                return $v->email == $info;
            }, ARRAY_FILTER_USE_BOTH);

        } 
        catch (Exception $e) {
            $e->getMessage();
            return $e;
        }
        
    }

    public function GetId($id)
    {
        try {
            $info = $id;

            return array_filter($this->data, function($v, $k) use ($info){ 
                return $v->id == $info;
            }, ARRAY_FILTER_USE_BOTH);

        } 
        catch (Exception $e) {
            $e->getMessage();
            return $e;
        }  
    }

    public function GetSalaryByRange($min, $max)
    {
        try {
            $salMin = $min;
            $salMax = $max;

            return array_filter($this->data, function($v, $k) use ($info){ 
                return $v->id == $info;
            }, ARRAY_FILTER_USE_BOTH);

        } 
        catch (Exception $e) {
            $e->getMessage();
            return $e;
        }  
    }

}
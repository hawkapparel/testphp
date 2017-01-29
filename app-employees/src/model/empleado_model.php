<?php
namespace App\Model;

use App\Lib\Response;

class EmpleadoModel
{
    private $data;
    
    public function __CONSTRUCT()
    {
        $jsonString = file_get_contents('info.json');
        $data = json_decode($jsonString);
    }
    
    public function GetAll()
    {
        $response = $this->$data;
        return $response;
    }
    
    public function Get($id)
    {
 
    }
}
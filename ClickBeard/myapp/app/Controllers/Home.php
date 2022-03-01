<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;

class Home extends BaseController
{
    function __construct() 
    {
        $session = \Config\Services::session($config);
        $session = session();
        if(!isset($_SESSION['TYPE'])){
            echo view("publico/login");
            exit();
        }
      
        
       
       
	}
    public function index()
    {

        $template=new Template();
        $data=["d"];
        $template->show("teste",  $data);
        
    }
}

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
        $session = \Config\Services::session($config);
        $session = session();
        if($_SESSION['TYPE']==1){
            

        }else{
            $this->agendar=new \App\Controllers\Agendar();
            $this->agendar->index();
        }
        

        
    }
}

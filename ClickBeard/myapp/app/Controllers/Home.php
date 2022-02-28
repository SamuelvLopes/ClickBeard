<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;

class Home extends BaseController
{
    public function index()
    {

        $template=new Template();
        $data=["d"];
        $template->show("teste",  $data);
        //$teste=new \App\Models\Teste();
        //$p=$teste->where('ID',1)->findAll();
        //var_dump($p);
      
    }
}

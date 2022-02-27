<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       $teste= new \App\Models\Teste();
       $teste2=$teste->where('IDESPECIALIDADE', 1)->findAll();
       var_dump($teste2);
       echo "teste";
    }
}

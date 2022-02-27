<?php

namespace App\Controllers;
use App\Models\Basic;

class Home extends BaseController
{
    public function index()
    {
        $teste=new \App\Models\Teste();
        $p=$teste->where('ID',1)->findAll();
        var_dump($p);
        echo "teste...";
    }
}

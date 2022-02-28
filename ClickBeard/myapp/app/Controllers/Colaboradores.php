<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;

class Colaboradores extends BaseController
{
    public $template;
    public $TableEspecialidade;

    function __construct() 
    {
        $this->template=new Template();
		$this->TableEspecialidade=new \App\Models\Especialidade();
	}
    public function index()
    {

        
        $data=["d"];
        $this->template->show("administrador/colaboradores",  $data);
        
      
    }
    public function especialidade()
    {
        $data=[
            "DESCRICAO"=>$_POST['DescricaoEspecialidade']
        ];

        $this->TableEspecialidade->insert($data);

    }
    public function cadastro()
    {
        $data=[
            "DESCRICAO"=>$_POST['DescricaoEspecialidade']
        ];

        $this->TableEspecialidade->insert($data);

    }
}
<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;
use App\Libraries\Upload;

class Colaboradores extends BaseController
{
    public $template;
    public $upload;
    public $TableEspecialidade;

    function __construct() 
    {
        $this->template=new Template();
        $this->upload=new Upload();
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
        var_dump($_POST);
       $arquivo=$this->upload->salvar($_FILES);
       
       $password=password_hash("PADRAO", PASSWORD_DEFAULT);
       $data=[

        "TYPE"=>2,
        "NOME"=>$_POST['Nome'],
        "NASCIMENTO"=>$_POST['DataNascimento'],
        "PASSWORD"=>$password,
        "EMAIL"=>$_POST['Email'],
        "FOTO"=>$arquivo,
        "CONTRATACAO"=>$_POST['DataContratacao']

       ];
    
    }
}
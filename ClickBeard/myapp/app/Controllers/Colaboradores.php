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
    public $TableUsuario;

    function __construct() 
    {
        $this->template=new Template();
        $this->upload=new Upload();
		$this->TableEspecialidade=new \App\Models\Especialidade();
        $this->TableUsuario=new \App\Models\Usuario();
	}
    public function index()
    {

        $users=$this->TableUsuario->where("TYPE",2)->findAll();
        var_dump($users);exit();
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
       $this->TableUsuario->insert($data);
       $this->index();
    }
}
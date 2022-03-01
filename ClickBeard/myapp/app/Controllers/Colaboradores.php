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
        $this->home=new \App\Controllers\Home();
        $session = \Config\Services::session($config);
        $session = session();
        if(!isset($_SESSION['TYPE'])||$_SESSION['TYPE']!=1){
           $this->home->index();
            exit();
        }
        $this->template=new Template();
        $this->upload=new Upload();
		$this->TableEspecialidade=new \App\Models\Especialidade();
        $this->TableUsuario=new \App\Models\Usuario();
        $this->TableBarbeiroespecialidade=new \App\Models\Barbeiroespecialidade();
        $this->home=new \App\Controllers\Home();
        $this->login=new \App\Controllers\Login();
        

	}
    public function index()
    {
        
        $users=$this->TableUsuario->where("TYPE",2)->findAll();
       

        
        for ($i = 0; $i <= count($users)-1; $i++) {
            $especialidade_list=[];
            $especialidades=$this->TableBarbeiroespecialidade->where("IDUSUARIO",$users[$i]->IDUSUARIO)->findAll();
           
            foreach($especialidades as $especialidade){
               
                $item=$this->TableEspecialidade->where("ID",$especialidade->IDESPECIALIDADE)->findAll()[0]->DESCRICAO;
                array_push($especialidade_list,$item);
                
            }
            $users[$i]->especialidade=$especialidade_list;
            
           
        }
        
        $data=["users"=>$users];
        $this->template->show("administrador/colaboradores",  $data);
        
      
    }
    public function especialidade()
    {
        $data=[
            "DESCRICAO"=>strtoupper($_POST['DescricaoEspecialidade'])
        ];

        $this->TableEspecialidade->insert($data);

    }
    public function RetornaIdEspecialidade($DESCRICAO){
        
        $especilidades=$this->TableEspecialidade->where('DESCRICAO', strtoupper($DESCRICAO))->findAll();
        
        foreach($especilidades as $especiliadade){

                      return $especiliadade->ID;
        }
         return false;
        

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
       
       $user=$this->TableUsuario->where('FOTO',$arquivo)->findAll()[0];
       
       
       $especialidades=explode("|||",$_POST['especialidades']);
     

       for ($i = 0; $i <= count($especialidades)-1; $i++) {
        
            $especialidade=$this->RetornaIdEspecialidade($especialidades[$i]);
        
            if($especialidade){

                $data=[
                    "IDESPECIALIDADE"=>$especialidade,
                    "IDUSUARIO"=>$user->IDUSUARIO
                ];
                $this->TableBarbeiroespecialidade->insert($data);

            }else{

                $data=["DESCRICAO"=>strtoupper($especialidades[$i])];
                $this->TableEspecialidade->insert($data);
                $especialidade=$this->RetornaIdEspecialidade($especialidades[$i]);
                $data=[
                    "IDESPECIALIDADE"=>$especialidade,
                    "IDUSUARIO"=>$user->IDUSUARIO
                ];
                $this->TableBarbeiroespecialidade->insert($data);
                
            }
        }
       
       $this->index();
    }
}
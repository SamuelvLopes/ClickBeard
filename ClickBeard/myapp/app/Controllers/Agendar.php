<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;

class Agendar extends BaseController
{
    
    public $TableEspecialidade;

    
    function __construct() 
    {

		$this->TableEspecialidade=new \App\Models\Especialidade();

    }
    function index(){
        $session = \Config\Services::session($config);
        $session = session();
        
        $template=new Template();
        $data=["d"];
        $template->show("publico/agendamento",  $data);

    }
    function buscarbarbeiro(){
       // $_POST['especialidade']="CORTE COM RISQUINHO";
        //$_POST['especialidade']="RAMAL";
        
        $this->TableUsuario=new \App\Models\Usuario();
        $this->TableBarbeiroespecialidade=new \App\Models\Barbeiroespecialidade();
        $this->TableEspecialidade=new \App\Models\Especialidade();
        $item=$this->TableEspecialidade->where("DESCRICAO",$_POST['especialidade'])->findAll()[0]->ID;
        
        $itens=$this->TableBarbeiroespecialidade->where("IDESPECIALIDADE",$item)->findAll();
        $ids=[];
        foreach($itens as $iten){
           array_push($ids,$iten->IDUSUARIO);
        
        }
        $barbeiros=[];
        foreach($ids as $id){
            
            $user=$this->TableUsuario->where("IDUSUARIO",$id)->findAll()[0];
            $barbeiro=[
                "id"=>$user->IDUSUARIO,
                "nome"=>$user->NOME
            ];
            array_push($barbeiros,$barbeiro);
            
        }
        $data=[
            'barbeiros'=>$barbeiros
        ];
    echo view("componentes/select_barbeiro",$data);
       

    }
    function buscarespecialidade(){

        
        
		$this->TableEspecialidade=new \App\Models\Especialidade();
        $Especialidades=$this->TableEspecialidade->like('DESCRICAO',strtoupper($_POST['especialidade']))->findAll();
        //var_dump($Especialidades);
        foreach($Especialidades as $Especialidade){

            echo $Especialidade->DESCRICAO."|||";
            echo $Especialidade->ID."|||";
        }


    }
    function agendamento(){

        var_dump($_POST);
    }
}
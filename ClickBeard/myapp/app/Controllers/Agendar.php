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
        $session = \Config\Services::session($config);
        $session = session();
        if(!isset($_SESSION['TYPE'])){
            echo view("publico/login");
            exit();
        }
    }
    function index(){
        $session = \Config\Services::session($config);
        $session = session();
        $this->TableAgendamento=new \App\Models\Agendamento();
        $this->TableBarbeiroespecialidade=new \App\Models\Barbeiroespecialidade();
        $this->TableUsuario=new \App\Models\Usuario();
        $template=new Template();
        
        $agendamentos=$this->TableAgendamento->where("IDUSUARIO",$_SESSION['ID']);
        $agendamentos=$agendamentos->where("HORARIO >",date('Y-m-d')." 00:00:01");
        $agendamentos=$agendamentos->findAll();
        
        for ($i = 0; $i <= count($agendamentos)-1; $i++) {
            
            $agendamentos[$i]->ESPECIALIDADE=$this->TableEspecialidade->where("ID",$agendamentos[$i]->IDESPECIALIDADE)->findAll()[0]->DESCRICAO;
            $agendamentos[$i]->BARBEIRO=$this->TableUsuario->where("IDUSUARIO",$agendamentos[$i]->IDBARBEIRO)->findAll()[0]->NOME;
            
        } 
        $this->TableEspecialidade=new \App\Models\Especialidade();
        $especialidades=$this->TableEspecialidade->findAll();



        $data=[
            "agendamentos"=>$agendamentos,
            "especialidades"=>$especialidades
        ];
        
        $template->show("publico/agendamento",  $data);

    }
    function buscarbarbeiro(){
       
        
        $this->TableUsuario=new \App\Models\Usuario();
        $this->TableBarbeiroespecialidade=new \App\Models\Barbeiroespecialidade();
        $this->TableEspecialidade=new \App\Models\Especialidade();
        $item=$this->TableEspecialidade->where("ID",$_POST['id'])->findAll()[0]->ID;
        
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
        $session = \Config\Services::session($config);
        $session = session();
        $this->TableAgendamento=new \App\Models\Agendamento();
      
        $data=[
            "HORARIO"=>$_POST['horario'],
            "IDBARBEIRO"=>$_POST['barbeiro'],
            "IDUSUARIO"=>$_SESSION['ID'],
            "IDESPECIALIDADE"=>$_POST['especialidade2']
        ];
        $this->TableAgendamento->insert($data);
        $this->index();
    }
}
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
            $data=[];
            $this->TableAgendamento=new \App\Models\Agendamento();
            $this->TableBarbeiroespecialidade=new \App\Models\Barbeiroespecialidade();
            $this->TableUsuario=new \App\Models\Usuario();
            $this->TableEspecialidade=new \App\Models\Especialidade();
            $this->template=new Template();
            
            
            //$date = new DateTime('+1 day');
            //echo  date('d-m-Y', strtotime('+1 day'));
            //numero de usuarios
            $numuser=$this->TableUsuario->where("TYPE",'3')->countAllResults();
            //num  barbeiros
            $numbarbeiros=$this->TableUsuario->where("TYPE",'2')->countAllResults();
            // especialidades
            $numespecialidade=$this->TableEspecialidade->countAllResults();
        $agendamentos=$this->TableAgendamento->where("HORARIO >",date('Y-m-d')." 00:00:01");
        $agendamentos=$agendamentos->where("HORARIO <",date('Y-m-d', strtotime('+1 day'))." 00:00:01");
        $agendamentos=$agendamentos->findAll();
        
        for ($i = 0; $i <= count($agendamentos)-1; $i++) {
            
            $agendamentos[$i]->ESPECIALIDADE=$this->TableEspecialidade->where("ID",$agendamentos[$i]->IDESPECIALIDADE)->findAll()[0]->DESCRICAO;
            $agendamentos[$i]->BARBEIRO=$this->TableUsuario->where("IDUSUARIO",$agendamentos[$i]->IDBARBEIRO)->findAll()[0]->NOME;
            
        } 
        


        $data=[
            "agendamentos"=>$agendamentos,
            "numuser"=>$numuser,
            "numbarbeiros"=>$numbarbeiros,
            "numespecialidade"=>$numespecialidade
        ];
        //var_dump($data);
        //exit();
        $this->template->show("administrador/home",  $data);

        }else{
            $this->agendar=new \App\Controllers\Agendar();
            $this->agendar->index();
        }
        

        
    }
}

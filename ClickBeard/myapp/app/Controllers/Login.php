<?php

namespace App\Controllers;
use App\Models\Basic;
use App\Libraries\Template;

class Login extends BaseController
{
    public $TableUsuario;
    
    function __construct() 
    {
        $session = \Config\Services::session($config);
        $session = session();

    }
    
    public function index()
    {
        $this->TableUsuario=new \App\Models\Usuario();
        $this->home=new \App\Controllers\Home();
        if(isset($_SESSION['TYPE'])){
            $this->home->index();
        }else{
       echo view("publico/login");
        }
    }
    public function deslogar(){
        unset($_SESSION['ID']);
        unset($_SESSION['TYPE']);
        unset($_SESSION['NOME']);
        unset($_SESSION['EMAIL']);
    }
    public function cadastro()
    {
        
        if(isset($_SESSION['TYPE'])){
            $this->home->index();
        }else{
       echo view("publico/cadastre");
        }
    }
    public function cadastrar()
    {
        $session = \Config\Services::session($config);
        $session = session();
               
        $data=[
            "TYPE"=>3,
            "NOME"=>strtoupper($_POST['NOME']),
            "EMAIL"=>strtoupper($_POST['EMAIL']),
            "PASSWORD"=>password_hash($_POST['PASSWORD'], PASSWORD_DEFAULT)
        ];
        
        $this->TableUsuario=new \App\Models\Usuario();
        $this->TableUsuario->insert($data);

       $_SESSION['NOME']=strtoupper($_POST['NOME']);
  //      $_SESSION['EMAIL']=strtoupper($_POST['EMAIL']);
        
        $this->logar();
    }
    public function logar(){

        if(isset($_SESSION['NOME'])){

            $_POST['NOME']=$_SESSION['NOME'];
            $_POST['EMAIL']=$_SESSION['EMAIL'];
        }

        $user=$this->TableUsuario->where('EMAIL',$_POST['EMAIL'])->findAll()[0];
        
        
            $_SESSION['ID']=$user->IDUSUARIO;
            $_SESSION['TYPE']=$user->TYPE;
    
        $this->index();
    }

}

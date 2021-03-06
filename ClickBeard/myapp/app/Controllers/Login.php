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
        $session = \Config\Services::session($config);
        $session = session();

        unset($_SESSION['ID']);
        unset($_SESSION['TYPE']);
        unset($_SESSION['NOME']);
        unset($_SESSION['EMAIL']);
        unset($_SESSION['email']);
        unset($_SESSION['logged_in']);
        unset($_SESSION['PASS']);
        unset($_SESSION['username']);
        unset($_SESSION['cadastro']);
        $this->home=new \App\Controllers\Home();
        $this->home->index();
    }
    public function cadastro()
    {
        $session = \Config\Services::session($config);
        $session = session();
        
        if(isset($_SESSION['TYPE'])){
            
            $this->home=new \App\Controllers\Home();
            $this->home->index();
        }else{
       echo view("publico/cadastre");
        }
    }
    public function cadastrar()
    {
        $session = \Config\Services::session($config);
        $session = session();

        $this->TableUsuario=new \App\Models\Usuario();
       
        $usuario=$this->TableUsuario->where("EMAIL",strtoupper($_POST['EMAIL']))->findAll()[0];
      
        if($usuario!=null){
            $this->cadastro();
            $_SESSION['mensagem']="Email já existe no cadastro";
            exit();
        }
        
        $data=[
            "TYPE"=>3,
            "NOME"=>strtoupper($_POST['NOME']),
            "EMAIL"=>strtoupper($_POST['EMAIL']),
            "PASSWORD"=>password_hash($_POST['PASSWORD'], PASSWORD_DEFAULT)
        ];
        
        
        $this->TableUsuario->insert($data);
        
        $_SESSION['EMAIL']=strtoupper($_POST['EMAIL']);
        $_SESSION['PASS']=$_POST['PASSWORD'];
        $this->logar();

    }
    public function logar(){
        $session = \Config\Services::session($config);
        $session = session();
       
        if(isset($_SESSION['EMAIL'])){

            $_POST['email']=$_SESSION['EMAIL'];
            $_POST['password']=$_SESSION['PASS'];

        }

        $this->TableUsuario=new \App\Models\Usuario();
        $user=$this->TableUsuario->where('EMAIL',strtoupper($_POST['email']))->findAll()[0];
        
        if($user!=null){
            if (password_verify($_POST['password'], $user->PASSWORD)) {
                      
            $_SESSION['ID']=$user->IDUSUARIO;
            $_SESSION['TYPE']=$user->TYPE;
           
        }else{
            $_SESSION['mensagem']="Senha invalida";
        }
        }else{

            $_SESSION['mensagem']="Email não encontrado";
        }
            
        //var_dump($_SESSION);
        $this->index();
        
    }

}

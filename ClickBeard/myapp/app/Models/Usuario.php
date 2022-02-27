<?php 
namespace app\Models;

use CodeIgniter\Model;


class Usuario extends Model
{
     protected $table      = 'USUARIO';
     protected $primaryKey = 'IDUSUARIO';
     protected $allowedFields= ['IDUSUARIO','TYPE',"NOME","NASCIMENTO","PASSWORD","EMAIL"];
     protected $returnType = 'object';

}
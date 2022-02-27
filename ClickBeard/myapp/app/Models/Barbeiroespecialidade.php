<?php 
namespace app\Models;

use CodeIgniter\Model;


class Barbeiroespecialidade extends Model 
{
     protected $table      = 'BARBEIRO_ESPECIALIDADE';
     protected $primaryKey = 'ID_BARBEIRO_ESPECIALIDADE';
     protected $allowedFields= ['ID_BARBEIRO_ESPECIALIDADE','IDUSUARIO','IDESPECIALIDADE'];
     protected $returnType = 'object';

}
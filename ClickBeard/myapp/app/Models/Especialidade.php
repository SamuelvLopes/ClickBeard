<?php 
namespace app\Models;

use CodeIgniter\Model;


class Especialidade extends Model 
{
     protected $table      = 'ESPECIALIDADE';
     protected $primaryKey = 'IDESPECIALIDADE';
     protected $allowedFields= ['IDESPECIALIDADE','DESCRICAO'];
     protected $returnType = 'object';

}
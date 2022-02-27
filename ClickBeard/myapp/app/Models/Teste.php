<?php 
namespace app\Models;

use CodeIgniter\Model;


class Teste extends Model
{
     protected $table      = 'ESPECIALIDADE';
     protected $primaryKey = 'ID';
     protected $allowedFields= ['ID','DESCRICAO'];
     protected $returnType = 'object';

}
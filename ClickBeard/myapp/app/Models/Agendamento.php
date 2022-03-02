<?php 
namespace app\Models;

use CodeIgniter\Model;


class Agendamento extends Model 
{
     protected $table      = 'AGENDAMENTO';
     protected $primaryKey = 'IDAGENDAMENTO';
     protected $allowedFields= ['IDAGENDAMENTO','IDUSUARIO','IDBARBEIRO','HORARIO','IDESPECIALIDADE'];
     protected $returnType = 'object';

}
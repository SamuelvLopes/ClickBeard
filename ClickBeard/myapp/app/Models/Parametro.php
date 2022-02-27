<?php 
namespace app\Models;

use CodeIgniter\Model;


class Parametro extends Model 
{
     protected $table      = 'PARAMETRO';
     protected $primaryKey = 'IDPARAMETRO';
     protected $allowedFields= ['IDPARAMETRO','IDUSUARIO','INTERVALO','INICIO','FIM'];
     protected $returnType = 'object';

}
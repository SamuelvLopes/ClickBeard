<?php
//var_dump($barbeiros);
foreach($barbeiros as $barbeiro){

    echo"<option value='".$barbeiro['id']."'>".$barbeiro['nome']."</option>";
    $f=false;
}
if(!isset($f)){
    echo"<option value='1'>Dono</option>";
} 
?>
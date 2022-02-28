<?php 
namespace App\Libraries;
class Upload
{
 
		function salvar($arquivo){
 			//pasta onde o arquivo será salvo
            $uploaddir = '/app/myapp/public/upload/';
                      
            $AuxExt= explode(".",basename($arquivo['Foto']['name']));

            $Ext=$AuxExt[count($AuxExt)-1];
            $ExtAllowed=["jpg","jpeg","pdf","png"];
            $seguro=false;
            foreach($ExtAllowed as $ExtL){

                if($Ext==$ExtL){
                    $seguro=true;
                }

            }
            if(!$seguro){
                return "upload/error.jpg";
                die();
            }

            //cria nome randomico
            $name=md5(sha1(rand().basename($arquivo['Foto']['name'])).md5(time().rand())).".".$Ext;

            $uploadfile = $uploaddir . $name;

            
            move_uploaded_file($arquivo['Foto']['tmp_name'],$uploadfile );

            return "upload/".$name;
		}
}
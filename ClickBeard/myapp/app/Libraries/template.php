<?php 
namespace App\Libraries;
class Template
{
 
		function show($view, $data){
 			
			// Load header
			echo view('template/header',$data);

			// Load content

			echo view($view, $data);
 
			// Load footer
			echo view('template/footer',$data);
 
			// Scripts
			echo view('template/scripts',$data);
		}
}
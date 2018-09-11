<?php

ini_set("display_errors", "On");

//incluir el archivo principal
include("Slim/Slim.php");
//registran la instancia de slim
\Slim\Slim::registerAutoloader();
//aplicacion 
$app = new \Slim\Slim();
//routing 
//accediendo VIA URL
//http:///www.google.com/
$app->get(
    '/',function() use ($app){
    	
    
    
	    
					$message = array("body" => "Parametro Invalido",
							"title" => "Modulo Garage");
					$url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array(
						//'registration_ids' => $tokens, //tokens
						//"condition" => "'Arqui1' in topics" || "'Arqui1' in topics",
						"to" => "/topics/Arqui1",
						'notification' =>$message
					);
	                    echo json_encode($fields);
					$headers = array('Content-Type: application/json',
						'Authorization:key=AIzaSyCmvxnrqEFD5nwkH_n4RB-ItWLVFsYwCfI'
					);
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
					$result = curl_exec($ch);
					
						echo $result;
					
						
						
					
					curl_close($ch);
    	//json 
       
    }
)->setParams(array($app));
$app->get(
	
    '/option/:opcion',function($opcion) use ($app){
	    $datos="";
   	 if($opcion==0){
          $datos = array("body" => "Se intento abrir el porton con una clave incorrecta", "title" => "Modulo Garage");
	 }else if($opcion==1){
	  $datos = array("body" => "Se abrio el porton con la clave correcta", "title" => "Modulo Garage");
	 }else{
		 $datos = array(
    					"body" => "Parametro invalidoe", 
    					"title" => "Modulo garage"
    					);
	 }
	    
	    $url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array(
						//'registration_ids' => $tokens, //tokens
						//"condition" => "'Arqui1' in topics" || "'Arqui1' in topics",
						"to" => "/topics/Arqui1",
						'notification' =>$datos
					);
	                    echo json_encode($fields);
					$headers = array('Content-Type: application/json',
						'Authorization:key=AIzaSyCmvxnrqEFD5nwkH_n4RB-ItWLVFsYwCfI'
					);
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_POST, true);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
					$result = curl_exec($ch);
					
						echo $result;
					
						
						
					
					curl_close($ch);
	    
	try{
    $db = new Mongo("mongodb://dbarqui1grupo1:Vvw81LEzH7OSVZUpr2eLXSkIueS6WEvkDzPbr1YTudlpRbLX4dxZKnxAzyZvyFU2rlPKeGLT8WhvvUKmbRSYPQ==@dbarqui1grupo1.documents.azure.com:10255/?ssl=true&replicaSet=globaldb");
    $registrations = $db->selectCollection('DBnotofication', 'notificacion');
} catch (Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "<br />";
}
 
if(!empty($_POST)) {
    try{
        $registration = $datos;
        $notificacion->insert($registration);
        echo "<h3>Your're registered!</h3>";
    } catch (Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "<br />";
    }
}  
	
 }	
);
//inicializamos la aplicacion(API)
$app->run();

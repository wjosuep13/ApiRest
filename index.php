<?php
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
    	
    	
    	$datos = array(
    					"Modulo" => "Garage", 
    					"Descripcion" => "Parametro invalido"
    					);
						$message = array("message" => "Intentaron Abrir el Porton ALV");
					$url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array(
						//'registration_ids' => $tokens, //tokens
						//"condition" => "'dogs' in topics || 'cats' in topics",
						"to" => "/topics/Arqui1",
						"data" => $message
					);
					$headers = array('Content-Type: application/json',
						'Authorization:key=AAAAR2pavnM:APA91bG1Ty5smmk_5k-kcH0TDvCy0zHEHAZ6A9ZeJOCbHAnOx-lm2wA8gf7pFyb09WQHX7BFMXjOhea5JqSJU0VGN7djqOkQ8RDAvjhporK0l77BBS-BM7yJ_1N6cGm3GnJeQtTt5uRM'
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
					
						echo json_encode($datos);
						
					
					curl_close($ch);
    	//json 
       
    }
)->setParams(array($app));
$app->get(
    '/option/:opcion',function($opcion) use ($app){
   	 if($opcion==NULL){
		   echo "hola bienvenido ";
	 }else if($opcion==0){
          $datos = array("Modulo" => "Garage", "Descripcion" => "Se intento abrir el porton con una contraseña incorrecta");
	 }else if($opcion==1){
	  $datos = array("Modulo" => "Garage", "Descripcion" => "Se abrio el porton con la contraseña correcta");
	 }
	    echo json_encode($datos);
    }
);
//inicializamos la aplicacion(API)
$app->run();

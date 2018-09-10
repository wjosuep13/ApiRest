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
    	
    
    	$datos = array(
    					"Title" => "Garage", 
    					"Body" => "Parametro invalido",
		                        "content_available" => "true",
                                        "priority" => "high",
    					);
	    
$request = new HttpRequest();
$request->setUrl('https://fcm.googleapis.com/fcm/send');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'Postman-Token' => 'ab022e97-ebb0-4e9d-8c9d-5357ab692d0f',
  'Cache-Control' => 'no-cache',
  'Content-Type' => 'application/json',
  'Authorization' => 'key=AIzaSyCmvxnrqEFD5nwkH_n4RB-ItWLVFsYwCfI'
));

$request->setBody('{
 "to" : "/topics/Arqui1",
  "notification" : {
 "body" : "great match!",
 "title" : "Portugal vs. Denmark"
 "content_available" : "true",
 "priority" : "high",
 }
}
');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
	    
						$message = array("message" => "Intentaron Abrir el Porton ALV");
					$url = 'https://fcm.googleapis.com/fcm/send';
					$fields = array(
						//'registration_ids' => $tokens, //tokens
						//"condition" => "'Arqui1' in topics",
						"to" => "/topics/Arqui1",
						"notification" =>$datos
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
          $datos = array("Modulo" => "Garage", "Descripcion" => "Se intento abrir el porton con una clave incorrecta");
	 }else if($opcion==1){
	  $datos = array("Modulo" => "Garage", "Descripcion" => "Se abrio el porton con la clave correcta");
	 }else{
		 $datos = array(
    					"Modulo" => "Garage", 
    					"Descripcion" => "Parametro invalido"
    					);
	 }
	    echo json_encode($datos);
	    
	try{
    $db = new Mongo("Vvw81LEzH7OSVZUpr2eLXSkIueS6WEvkDzPbr1YTudlpRbLX4dxZKnxAzyZvyFU2rlPKeGLT8WhvvUKmbRSYPQ==");
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

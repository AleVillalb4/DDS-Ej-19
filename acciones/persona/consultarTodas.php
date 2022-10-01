<?php   
header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../persona/responses/consultarTodasResponse.php';
require_once '../../configuracion/database.php';

$resp = new ConsultarTodasResponse();
$resp->ListPersonas = Persona::BuscarTodas();  

echo json_encode($resp);
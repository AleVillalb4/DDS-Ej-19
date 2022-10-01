<?php   
header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../persona/responses/eliminarResponse.php';
require_once '../persona/request/eliminarRequest.php';
require_once '../../configuracion/database.php';


$json = file_get_contents('php://input',true);
$req = json_decode($json);

$PersonaEliminar = new Persona();
$PersonaEliminar->Id = $req->Id;
$PersonaEliminar->Eliminar();

$resp = new EliminarResponse();
$resp->IsOk = true;

echo json_encode($resp);
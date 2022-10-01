<?php   
header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../persona/responses/modificarResponse.php';
require_once '../../configuracion/database.php';
//require_once '../persona/request/modificarRequest.php';

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$PersonaModificar = new Persona();
$PersonaModificar->Nombre = $req->Nombre;
$PersonaModificar->Apellido = $req->Apellido;
$PersonaModificar->NroDocumento = $req->NroDocumento;
$PersonaModificar->Direccion = $req->Direccion;
$PersonaModificar->Email = $req->Email;
$PersonaModificar->Id = $req->Id;
$PersonaModificar->Modificar();

$resp = new ModificarResponse();
$resp->IsOk = true;

echo json_encode($resp);

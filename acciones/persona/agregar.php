<?php   
header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../persona/responses/agregarResponse.php';
require_once '../../configuracion/database.php';
require_once '../persona/request/agregarRequest.php';

$json = file_get_contents('php://input',true);
$req = json_decode($json);

$PersonaAgregar = new Persona();
$PersonaAgregar->Nombre = $req->Nombre;
$PersonaAgregar->Apellido = $req->Apellido;
$PersonaAgregar->NroDocumento = $req->NroDocumento;
$PersonaAgregar->Direccion = $req->Direccion;
$PersonaAgregar->Email = $req->Email;
$PersonaAgregar->Agregar();

$resp = new AgregarResponse();
$resp->IsOk = true;

echo json_encode($resp);
<?php
header('Content-Type: application/json');

require_once '../../modelo/persona.php';
require_once '../persona/responses/consultarResponse.php';
require_once '../../configuracion/database.php';

$Id = $_GET['Id'];

$resp = new ConsultarResponse();
$resp->Persona = Persona::Buscar($Id);

echo json_encode($resp);

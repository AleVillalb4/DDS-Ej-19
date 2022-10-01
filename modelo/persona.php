<?php
class Persona
{

    public $Id;
    public $Nombre;
    public $Apellido;
    public $NroDocumento;
    public $Direccion;
    public $Email;

    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from personas";
        $querypersonas = $con->db->prepare($sql);
        $querypersonas->execute();
        $querypersonas->setFetchMode(PDO::FETCH_CLASS, 'Persona');

        $ListPersonasADevolver = array();

        foreach ($querypersonas as $per) {
            $ListPersonasADevolver[] = $per;
        }

        return $ListPersonasADevolver;
    }

    public static function Buscar($Id)
    {
        $con  = Database::getInstance();
        $sql = "select * from personas where Id = :p1";
        $queryPersona = $con->db->prepare($sql);
        $params = array("p1" => $Id);
        $queryPersona->execute($params);
        $queryPersona->setFetchMode(PDO::FETCH_CLASS, 'Persona');
        foreach ($queryPersona as $per) {
            return $per;
        }
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into personas (Nombre, Apellido, NroDocumento, Direccion, Email) values (:p1,:p2,:p3,:p4,:p5)";
        $Persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDocumento, "p4" => $this->Direccion, "p5" => $this->Email);
        $Persona->execute($params);
    }
    public function Modificar()
    {
        $con = Database::getInstance();
        $sql = "UPDATE personas
                    SET
                    Nombre = :p1,
                    Apellido = :p2,
                    NroDocumento = :p3,
                    Direccion = :p4,
                    Email = :p5
                    WHERE Id = :p6";
        $Persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Nombre, "p2" => $this->Apellido, "p3" => $this->NroDocumento, "p4" => $this->Direccion, "p5" => $this->Email, "p6" => $this->Id);
        $Persona->execute($params);
    }
    public function Eliminar()
    {
        $con = Database::getInstance();
        $sql = "DELETE FROM personas WHERE Id = :p1";
        $Persona = $con->db->prepare($sql);
        $params = array("p1" => $this->Id);
        $Persona->execute($params);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 12/04/2019
 * Time: 09:47
 */

namespace src\model;
use config\model;
use src\entities\Ferme;

class FermeDao extends model
{
    public function insert($obect)
    {
        try {
            //$obect = new Ferme();
            $sql = "INSERT INTO ferme (nom, date_creation) VALUES(:nom, :date_creation)";
            $stm= $this->db->prepare($sql);
            $stm->bindValue(':nom', $obect->getNom());
            //var_dump($obect->getNom());
            $stm->bindValue(':date_creation', date("Ymd"));
            $exe = $stm->execute();
            if ($exe) {
                $result_sql = "Ajout ferme bine réussie ! ";
            }
            else {
                throw new \Exception("Erreur ajout ferme, veillez réessayer");
            }
        }
        catch (\PDOException $e) {
            $result_sql =$e->getMessage();
        }
        return $result_sql;
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM ferme";//test
            $stm = $this->db->prepare($sql);
            $exe = $stm->execute();
            if ($exe) {
                $fermes = [];
                while ($data = $stm->fetch(\PDO::FETCH_ASSOC)) {
                    $fermes [] = $data;
                }
                return $fermes;
            }
            else {
                return "error base de données !";
            }
        }
        catch (\PDOException $e) {
            //
            $pdoExp = $e->getMessage();
        }
    }

    public function findOne($id)
    {

    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        $sql = "DELETE FROM ferme WHERE id_ferme=$id";
        $stm = $this->db->prepare($sql);
        $exe = $stm->execute();
        if ($exe) {
            $result_sql = "La ferme ".$id. " a été bien supprimée !";
        }
        else {
            throw new \Exception("Erreur suppression ! ");
        }
        return $result_sql;
    }
}
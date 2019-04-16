<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 12/04/2019
 * Time: 10:07
 */
use config\Controller;
use src\model\FermeDao;
use src\entities\Ferme;
class FermeController extends Controller
{
    public function getAll() {
        $fermeDao = new FermeDao();
        $fermes = $fermeDao->findAll();
        extract($fermes);
        $this->view->assign("fermes", $fermes);
        $this->view->load("ferme/getAll");
    }
    public function add() {
        if (isset($_POST['add']) && !empty($nom)) {
            extract($_POST);
            // TEST DE VALIDATION DES DONNEES DU FORMULAIRE
            if (!empty($nom)) {
                $fermeDao = new FermeDao();
                $ferme = new Ferme();
                $ferme->setNom($nom);
                //var_dump($ferme->getNom());
                try {
                    $data = $fermeDao->insert($ferme);
                }
                catch (Exception $e) {
                    $data = $e->getMessage();
                }
            }
            else {
                $data = "Veillez remplir le champs nom de la ferme ! ";
            }
            $this->view->assign("result_sql", $data);
            $this->view->assign("nom", $nom);
            // ON RETOURNE LA LISTE DE TOUTES LES FERMES.
            $this->getAll();
        }
        // VIEW AJOUT FERME
        else {
            $this->view->load("ferme/add");
        }
    }

    public function deleteFerme($id) {
        $fermeDao = new FermeDao();
        try {
            $result_sql = $fermeDao->delete($id);
        }
        catch (PDOException $e) {
            $result_sql = $e->getMessage();
        }
        // ON RETURNE LA LISTE DES FERMES
        $this->view->assign("result_sql", $result_sql);
        $this->getAll();
    }
}
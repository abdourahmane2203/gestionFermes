<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 12/04/2019
 * Time: 09:19
 */
use config\Controller;
use src\model\AnimalDao;
class AnimalController extends Controller
{
    public function add() {
        $this->view->assign("test", "Valeur à tester");
        $this->view->load("animal/add");
    }
    public function getAll() {
        $animalDao = new AnimalDao();
        $dao = $animalDao->findAll();
        $this->view->assign('cle', $dao);
        return $this->view->load("animal/getAll");
    }
}
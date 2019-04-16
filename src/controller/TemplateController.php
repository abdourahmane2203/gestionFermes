<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 12/04/2019
 * Time: 08:26
 */
use config\Controller;
class TemplateController extends Controller
{
    public function template() {
        return $this->view->load("template/getAll");
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 12:22
 */
namespace src\entities;
class Ferme
{
    private $_id;
    private $_nom;
    private $_date_creation;

    public function __construct()
    {
        //$this->hydrate($data);
    }
    // HYDRATATION DEE DONNEES => POUR CHARGER LES SETTERS
    public function hydrate($data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key); // EX : ['nom' => 'Diallo' ] => setNom('Diallo');
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    // GEETTERS

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->_date_creation;
    }
    // SETTERS

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if (is_int($id) && $id > 0){
            $this->_id = $id;
        }
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        if (is_string($nom)) {
            $this->_nom = $nom;
        }
    }

    /**
     * @param mixed $date_creation
     */
    public function setDatecreation($date_creation)
    {
        $this->_date_creation = $date_creation;
    }
}
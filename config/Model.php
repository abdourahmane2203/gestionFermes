<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 11:52
 */
namespace config;

abstract class  Model
{
    protected $db;
    private static $_dbb;

    public function __construct()
    {   // INSTANCIE LA CONNEXION
        require_once 'Database.php';
        $this->db = \Database::getConnection();
        //$this->db = self::getConnection(); // CETTE VARIABLE SERA RECUPEREE LORS DE L'INCLUSION DE Database.php
    }
    // Instancie la connexion
    private static function setConnection(){
        try {
            $dsn = 'mysql:host=localhost;dbname=ferme;charset=utf8';
            $username = 'root';
            $passwd = '';
            self::$_dbb = new \PDO($dsn, $username, $passwd);
            self::$_dbb->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        }
        catch (\PDOException $e) {
            // CETTE VARIABLE UTILISEE EN PRODUCTION
            $pdoException = $e->getMessage();
        }
    }

    // Récupere la connexion
    protected function getConnection(){
        // ON TESTE SI LA CONNEXION EST INSTANCIEE
        if(self::$_dbb == null){
            self::setConnection();
        }
        return self::$_dbb;
    }
    // TOUTES LES CLASSSES DAO UTILISERONS CES METHODES
    abstract public function insert($obect);
    abstract public function findAll();
    abstract public function findOne($id);
    abstract public function update($id);
    abstract public function delete($id);

}
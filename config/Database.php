<?php
class Database
{
    public static function getConnection() {
        $host = 'localhost';
        $dbname = 'ferme';
        $user = 'root';
        $password = '';

        $dsn = "mysql:/host=$host;dbname=$dbname";
        try {
            $db = new PDO($dsn, $user, $password);
        }
        catch(PDOException $e) {
            // AFFICHE LE MESSAGE D'ERREUR ET ARRETE LE SCRIPT.
            die('Error : '.$e->getMessage());
        }
        return $db;
    }
}
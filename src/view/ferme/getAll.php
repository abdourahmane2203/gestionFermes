<a href="/gestionFermes/ferme/add">ajouter une ferme</a>
<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 14:51
 */
 if (isset($result_sql))
     echo $result_sql;

foreach ($fermes as $ferme) {
    extract($ferme);
    echo $id_ferme.' '.$nom.' '. $date_creation.'<br>';
} ?>



<?php
/**
 * Created by PhpStorm.
 * User: MAS
 * Date: 29/01/2020
 * Time: 07:55
 */

class reponseDevi
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function insertReponseDevis($devi_id,$traducteur_id,$dateReponse,$fichier)
    {
        try
        {
            $accepte='0';
            $valide='0';
            $stmt = $this->db->prepare("INSERT INTO reponsedevi(devi_id,traducteur_id,dateReponse,fichierReponse,accepte,valide) VALUES(:devi_id,:traducteur_id,:dateReponse,:fichierReponse,:accepte,:valide)");

            $stmt->bindparam(":devi_id", $devi_id);
            $stmt->bindparam(":traducteur_id", $traducteur_id);
            $stmt->bindparam(":dateReponse", $dateReponse);
            $stmt->bindparam(":fichierReponse", $fichier);
            $stmt->bindparam(":accepte", $accepte);
            $stmt->bindparam(":valide", $valide);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function redirect($url)
    {
        header("Location: $url");
    }
}
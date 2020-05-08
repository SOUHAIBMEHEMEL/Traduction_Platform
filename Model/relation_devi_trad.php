<?php
/**
 * Created by PhpStorm.
 * User: MAS
 * Date: 29/01/2020
 * Time: 07:55
 */

class relation_devi_trad
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function insertRelationDevis($devi_id,$traducteur_id)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO demandedevi(devi_id,traducteur_id) VALUES(:devi_id,:traducteur_id)");

            $stmt->bindparam(":devi_id", $devi_id);
            $stmt->bindparam(":traducteur_id", $traducteur_id);

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
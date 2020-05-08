<?php
/**
 * Created by PhpStorm.
 * User: MAS
 * Date: 22/01/2020
 * Time: 14:28
 */

class Devis
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function DemanderDevis($user_id,$nom,$prenom,$email,$phone,$adresse,$wilaya,$commune,$lang_orig,$lang_src,$typetraduction,$comments,$specification,$assermente,$id_fichier,$dateCreation)
    {
        try
        {
            $stmt = $this->db->prepare("INSERT INTO devi(user_id,nom,prenom,mail,phone,adresse,wilaya,commune,lang_orig,lang_src,typetraduction,comments,specification,assermente,id_fichier,dateCreation) 
             VALUES(:user_id,:nom,:prenom,:email,:phone,:adresse,:wilaya,:commune,:lang_orig,:lang_src,:typetraduction,:comments,:specification,:assermente,:id_fichier,:dateCreation)");

            $stmt->bindparam(":user_id", $user_id);
            $stmt->bindparam(":nom", $nom);
            $stmt->bindparam(":prenom", $prenom);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":adresse", $adresse);
            $stmt->bindparam(":wilaya", $wilaya);
            $stmt->bindparam(":commune", $commune);
            $stmt->bindparam(":lang_orig", $lang_orig);
            $stmt->bindparam(":lang_src", $lang_src);
            $stmt->bindparam(":typetraduction", $typetraduction);
            $stmt->bindparam(":specification", $specification);
            $stmt->bindparam(":comments", $comments);
            $stmt->bindparam(":specification", $specification);
            $stmt->bindparam(":assermente", $assermente);
            $stmt->bindparam(":id_fichier", $id_fichier);
            $stmt->bindparam(":dateCreation", $dateCreation);

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
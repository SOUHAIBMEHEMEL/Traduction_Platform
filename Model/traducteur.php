<?php
/**
 * Created by PhpStorm.
 * User: MAS
 * Date: 18/01/2020
 * Time: 22:07
 */

class traducteur
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function register($fname,$lname,$uname,$umail,$upass,$phone,$fax,$wilaya,$commune,$adresse,$assermente,$langues)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO traducteur(user_name,user_email,user_pass,fname,lname,phone,fax,wilaya,commune,adresse,assermente,langues,bloque) 
                                        VALUES(:uname, :umail, :upass,:fname,:lname,:phone,:fax,:wilaya,:commune,:adresse,:assermente,:langues,:bloque)");
            $bloque='1';
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);
            $stmt->bindparam(":phone", $phone);
            $stmt->bindparam(":fax", $fax);
            $stmt->bindparam(":wilaya", $wilaya);
            $stmt->bindparam(":commune", $commune);
            $stmt->bindparam(":adresse", $adresse);
            $stmt->bindparam(":assermente", $assermente);
            $stmt->bindparam(":langues", $langues);
            $stmt->bindparam(":bloque", $bloque);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function login($uname,$umail,$upass)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM traducteur WHERE user_name=:uname OR user_email=:umail LIMIT 1");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if((password_verify($upass, $userRow['user_pass']))&&($userRow['bloque']!=='1'))
                {
                    $_SESSION['user_session'] = $userRow['user_id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function modifierPrenom($id,$fname)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE traducteur SET fname=:fname WHERE user_id=:uid");
            $stmt->bindparam(":fname", $fname);
            $stmt->bindparam(":uid", $id);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function modifierNom($id,$lname)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE traducteur SET lname=:lname WHERE user_id=:uid");
            $stmt->bindparam(":lname", $lname);
            $stmt->bindparam(":uid", $id);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function modifierMail($id,$umail)
    {
        try
        {
            $stmt = $this->db->prepare("UPDATE traducteur SET user_email=:umail WHERE user_id=:uid");
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":uid", $id);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function modifierPassword($id,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE traducteur SET user_pass=:upass WHERE user_id=:uid");
            $stmt->bindparam(":upass", $new_password);
            $stmt->bindparam(":uid", $id);
            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    public function is_loggedin()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        header('location: ../index.php');
        return true;
    }
}

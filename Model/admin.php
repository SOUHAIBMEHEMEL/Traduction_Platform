<?php
/**
 * Created by PhpStorm.
 * User: MAS
 * Date: 18/01/2020
 * Time: 22:07
 */

class admin
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function register($uname,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO admin(user_name,user_pass) VALUES(:uname, :upass)");
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":upass", $new_password);
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
            $stmt = $this->db->prepare("SELECT * FROM admin WHERE user_name=:uname LIMIT 1");
            $stmt->execute(array(':uname'=>$uname));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0)
            {
                if(password_verify($upass, $userRow['user_pass']))
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


    public function modifierPassword($id,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("UPDATE admin SET user_pass=:upass WHERE user_id=:uid");
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

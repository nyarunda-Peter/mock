<?php
namespace Mock;

use \Mock\DataSource;

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }
    
    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM users where Email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */
    public function registerMember()
    {
        //$isUsernameExists = $this->isUsernameExists($_POST["username"]);
        $isEmailExists = $this->isEmailExists($_POST["email"]);
        // if ($isUsernameExists) {
        //     $response = array(
        //         "status" => "error",
        //         "message" => "Username already exists."
        //     );
        // } else
        if ($isEmailExists) {
            $response = array(
                "status" => "error",
                "message" => "Email already exists."
            );
        } else {
            if (! empty($_POST["password"])) {

                // PHP's password_hash is the best choice to use to store passwords
                // do not attempt to do your own encryption, it is not safe
                $hashedPassword = md5($_POST["password"]);
            }
            $query = "INSERT INTO users (Firstname, Lastname, Email, Password, Phone_No, Role_As ) VALUES (?, ?, ?, ?, ?, ?)";
            $paramType = 'sssssi';
            $paramValue = array(
                $_POST["firstname"],
                $_POST["lastname"],
                $_POST["email"],
                $hashedPassword,
                $_POST["phone"],
                $_POST["role"]
            );
            $memberId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "You have registered successfully."
                );
            }
        }
        return $response;
    }


    function getMemberById($memberId)
    {
        $query = "select * FROM users WHERE User_ID = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $memberResult;
    }
    
    public function processLogin($useremail, $password) {
        $passwordHash = md5($password);
        $query = "select * FROM users WHERE Email = ? AND Password = ?";
        $paramType = "ss";
        $paramArray = array($useremail, $passwordHash);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $_SESSION["userId"] = $memberResult[0]["User_ID"];
            return true;
        }
    }

    
}
<?php
namespace Mock;

use \Mock\DataSource;

class Property
{
    private $dbConn;

    private $ds;

    function __construct()
    {
        require_once "DataSource.php";
        $this->ds = new DataSource();
    }
    
    public function isPropertyExist($property)
    {
        $query = 'SELECT * FROM property where Property_Title = ?';
        $paramType = 's';
        $paramValue = array(
            $property
        )
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
     * to Register a property
     *
     * @return string[] registration status message
     */
    public function registerProperty()
    {
      
        $isPropertyExist = $this->isPropertyExist($_POST["prop-title"]);
 
        if ($$isPropertyExist) {
            $response = array(
                "status" => "error",
                "message" => "Property already exists."
            );
        } else {
            
            $query = "INSERT INTO property ( User_ID, Property_Title, Property_Description, Property_Category, Property_type, Location) VALUES (?, ?, ?, ?, ?, ?)";
            $paramType = 'sssiii';
            $paramValue = array(
                $_POST[""],
                $_POST[""],
                $_POST[""],
                $_POST[""],
                $_POST[""],
                $_POST[""]
            );
            $propertyId = $this->ds->insert($query, $paramType, $paramValue);
            if (! empty($propertyId)) {
                $response = array(
                    "status" => "success",
                    "message" => "You have registered successfully."
                );
            }
        }
        return $response;
    }
}
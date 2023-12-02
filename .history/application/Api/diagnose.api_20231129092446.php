<?php

include_once("../config/conn.db.php");


class diagnose extends DatabaseConnection
{

    public function readDiagnose($conn){
        extract($_POST);
        $res= array();
        $data = array();
        $sql = "SELECT *from diagnose";
        if(!$conn)
          $res=array("error"=> "there is an error");
        else{
            $result = $conn->query($sql);
            if($result){
                while($rows=$result->fetch_assoc())
                {
                    $data[]=$rows;
                }
                $res= array("message"=>"success","data"=>$data);
            }else{
                $res= array("error"=>"there is an error");
            }
        }
        echo json_encode($res);
    }

  
    public  function createDiagnose($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT into diagnose(`name`,`description`) VALUES ('$name','$discription')";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "diagnose was created..", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo  json_encode($response);
    }

 
    public  function deleteDiagnose($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM diagnose where pro_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "diagnose was deleted..", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo  json_encode($response);
    }

    public function updateDiagnose($conn){
        extract($_POST);
        $response = array();

        $sql = "UPDATE diagnose set `name` = $name, 'description' = $description WHERE pro_id = $id";
        if(!$conn){
        $response = array("error"=>"There is an error in the connetction", "status"=>false);
        }
        else{
            $result =$conn->query($sql);
            if($result)
                $response = array("message"=> "Successfully updated","status"=>true);
            else
                $response = array("error"=>"There an error for updating","status"=>false);
        }
        echo json_encode($response);
    }                                                                                                                                                           
}

$action=$_POST['action'];

$diagnose =new Diagnose ;

// if($action){
//     $diagnose ->$action(Diagnose ::getConnection());
// }else echo "action is required";

switch ($_POST['action']) {
    case "createDiagnose":
        $diagnose->createDiagnose(Diagnose::getConnection());
        break;
    case "updateDiagnose":
        $diagnose->updateDiagnose(Diagnose::getConnection());
        break;
    case "readDiagnose":
        $diagnose->readDiagnose(Diagnose::getConnection());
        break;
        case "deleteDiagnose":
            $diagnose->deleteDiagnose(Diagnose::getConnection());
            break;
    case "fetchingOne":
        $Diagnose->fetchingOne(Diagnose::getConnection());
        break;
     
    default:
        return;
}

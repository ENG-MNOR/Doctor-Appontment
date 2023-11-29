<?php

include_once("../config/conn.db.php");


class Admin extends DatabaseConnection
{

 
    public function fetchingOne($conn){
        extract($_POST);
        $res= array();
        $data = array();
        $sql = "SELECT *from admins where 
        admin_id='$id'";
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

    public  function readAdmins($_conn)
    {
        extract($_POST);
        $response = array();
        $data=array();

        $sql = "SELECT *FROM admins";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    {
                     while($rows= $result->fetch_assoc()){
                        $data[]=$rows;
                     }

                    $response = array("error" => "", "status" => true,"data"=>$data);
                    }
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
    public  function createAdmin($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT into admins(`username`,`email`,`password`) VALUES ('$username','$email','$password')";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was created..", "status" => true);
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

    public  function deleteAdmin($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM admins where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was deleted..", "status" => true);
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
   
    public  function updateAdmin($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "UPDATE admins set username='$username', email='$email'  where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was updated..", "status" => true);
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
}
$admin = new Admin;
// checking
switch ($_POST['action']) {
    case "createAdmin":
        $admin->createAdmin(Admin::getConnection());
        break;
    case "readAdmins":
        $admin->readAdmins(Admin::getConnection());
        break;
        case "fetchingOne":
            $admin->fetchingOne(Admin::getConnection());
            break;
    
    case "updateAdmin":
        $admin->updateAdmin(Admin::getConnection());
        break;
    

    case "deleteAdmin":
        $admin->deleteAdmin(Admin::getConnection());
        break;
    default:
        return;
}

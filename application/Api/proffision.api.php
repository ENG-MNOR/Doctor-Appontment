<?php

include_once("../config/conn.db.php");


class Proffision extends DatabaseConnection
{

    public function readProffision($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from proffision";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }
    public function filterProfession($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
       
        $sql = "SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID, 
        hospitals.name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
        proffision.name as pro_name, proffision.pro_id FROM doctors
        INNER JOIN hospitals
        ON doctors.hospital_id=hospitals.hospital_id
        JOIN proffision
        on doctors.profision_id=proffision.pro_id
        WHERE doctors.verified='YES' and proffision.name='$pro'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        // $res=array("hi"=>true);
        echo json_encode($res);
    }

    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from proffision where 
        pro_id='$id'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }


    public function createProffision($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT into proffision(`name`,`description`) VALUES ('$name','$decription')";
        if (!$conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {

                $result = $conn->query($sql);
                if ($result)
                    $response = array("message" => "profision was created..", "status" => true);
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
        echo json_encode($response);

    }


    public function deleteProffision($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM proffision where pro_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "proffision was deleted..", "status" => true);
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

        echo json_encode($response);
    }

    public function updateProffision($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "UPDATE proffision set `name` =' $name', `description` = '$description' WHERE `pro_id` = '$id'";
        if (!$conn) {
            $response = array("error" => "There is an error in the connetction", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result)
                $response = array("message" => "Successfully updated", "status" => true);
            else
                $response = array("error" => "There an error for updating", "status" => false);
        }
        echo json_encode($response);
    }
}

$profission = new Proffision;
// checking
switch ($_POST['action']) {
    case "createProffision":
        $profission->createProffision(Proffision::getConnection());
        break;
    case "filterProfession":
        $profission->filterProfession(Proffision::getConnection());
        break;
    case "updateProffision":
        $profission->updateProffision(Proffision::getConnection());
        break;
    case "readProffision":
        $profission->readProffision(Proffision::getConnection());
        break;
    case "deleteProffision":
        $profission->deleteProffision(Proffision::getConnection());
        break;
    case "fetchingOne":
        $profission->fetchingOne(Proffision::getConnection());
        break;

    default:
        return;
}

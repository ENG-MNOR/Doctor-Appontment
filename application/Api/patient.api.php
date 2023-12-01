<?php
include_once '../config/conn.db.php';
header ("Content-type: application/json");
$action=$_POST['action'];

class Patient extends DatabaseConnection
    {
    
    public function readPatient($conn)
        {
            $response=array();
            $data=array();
            $sql="select * from patients";
            if(!$conn)
                $response=array("error"=>"error from database","status"=>false);
            else{
                $result=$conn->query($sql);
                if($result)
                    {
                        while($rows=$result->fetch_assoc()){
                            $data[]=$rows;
                        }
                        $response=array("status"=>true,"data"=>$data);
                    }   
                }    
            echo json_encode($response);
        }
    public function deletePatient($conn)
        {
        extract($_POST);
        $response=array();
        $sql="DELETE FROM patients WHERE pat_id=$id";
        if(!$conn){
            $response=array("error"=>" error connection","status"=>false);
        }
        else{
            $result=$conn->query($sql);
            if($result){
                $response=array("message"=>"patients successfully deleted","status"=>true);
            }
            else{
                $response=array("error"=>"there is an error connection","status"=>false);
            }
        }
        echo json_encode($response);

        }

    public function createPatient($conn)
        {
            extract($_POST);
            $response=array();
         
            if($hasProfile=="true"){
                $fileName = $_FILES['profile_image']['name'];
                $extension= explode(".",$fileName)[1];
                $tempFolder = $_FILES['profile_image']['tmp_name'];
                $newName= rand() . "." . $extension;
                $uploadPath = "../uploads/".$newName;
                if(move_uploaded_file($tempFolder,$uploadPath)){
                $sql = "INSERT INTO `patients` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password','$newName')";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "patient successfully created...", "status" => true);
                    } else {
                        $response = array("error" => " error connection", "Status" => false);
                    }
                }
                }else
                $response = array("error" => "there is an error during uploading", "status" => false);
                



            }else{
            $sql = "INSERT INTO `patients` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password','no_profile')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "patient successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
            }
        //    $response[]=["status" =>$hasProfile];

            echo json_encode($response);
        }

    public function updatePatient($conn)
        {
        extract($_POST);

        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $extension = explode(".", $fileName)[1];
            $tempFolder = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $extension;
            $uploadPath = "../uploads/" . $newName;
            if (move_uploaded_file($tempFolder, $uploadPath)) {
                $sql = "UPDATE `patients` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`profile_image`='$newName' WHERE pat_id='$id'";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "patient successfully updated...", "status" => true);
                    } else {
                        $response = array("error" => " error connection", "Status" => false);
                    }
                }
            } else
                $response = array("error" => "there is an error during uploading", "status" => false);
        } else {
            $sql = "UPDATE `patients` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email' WHERE pat_id='$id'";

            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "patient successfully updated...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }
       
       
       
    //    end updating process
       
        echo json_encode($response);
        }

    public function fetchPatientData($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from patients where 
        pat_id='$id'";
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


    }

$patient=new Patient;

if($action){
    $patient->$action(Patient::getConnection());
}else echo "action is required";













?>
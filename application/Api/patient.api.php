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
            $sql = "INSERT INTO `patients` (`patient_id`, `name`, `gender`, `mobile`, `address`, `email`, `password`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password','$profile_image')";    
            if(!$conn){
                $response=array("error"=>"there is an error connection","status"=>false);
            }
            else{
                $result=$conn->query($sql);
                if($result){
                    $response=array("message"=>"patient successfully created...","status"=>true);
                }
                else{
                    $response=array("error"=>" error connection","Status"=>false);
                }
            }

            echo json_encode($response);
        }

    public function updateDoctor($conn)
        {
        extract($_POST);
        $response=array();
        $sql="UPDATE `patients` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profile_image`='[$profile_image]' WHERE pat_id='$id'";
        if(!$conn){
            $response=array("error"=>"there is an error connection","status"=>false);
        }
        else{
            $result=$conn->query($sql);
            if($result){
                $response=array("message"=>"Admin was updated","status"=>true);
            }
            else{
                $response=array("error"=>"there is an error connection","status"=>false);
            }
        }
        echo json_encode($response);
        }


    }

$patient=new Patient;

if($action){
    $patient->$action(Patient::getConnection());
}else echo "action is required";













?>
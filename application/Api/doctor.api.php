<?php
include_once '../config/conn.db.php';
header ("Content-type: application/json");
$action=$_POST['action'];

class Doctors extends DatabaseConnection
    {
    
    public function readDoctors($conn)
        {
            $response=array();
            $data=array();
            $sql="select * from doctors";
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
    public function deleteDoctor($conn)
        {
        extract($_POST);
        $response=array();
        $sql="DELETE FROM doctors WHERE dr_id=$id";
        if(!$conn){
            $response=array("error"=>"there is an error connection","status"=>false);
        }
        else{
            $result=$conn->query($sql);
            if($result){
                $response=array("message"=>"Doctor successfully deleted","status"=>true);
            }
            else{
                $response=array("error"=>"there is an error connection","status"=>false);
            }
        }
        echo json_encode($response);

        }

    public function createDoctor($conn)
        {
            extract($_POST);
            $response=array();
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `verified`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$profision_id', '$hospital_id', '$verified', '$description', '$image')";    
            if(!$conn){
                $response=array("error"=>"there is an error connection","status"=>false);
            }
            else{
                $result=$conn->query($sql);
                if($result){
                    $response=array("message"=>"Doctor successfully created...","status"=>true);
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
        $sql="UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$profision_id',`hospital_id`='$hospital_id',`verified`='$verified',`description`='$description',`profile_image`='[$image]' WHERE dr_id='$id'";
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

$doctors=new Doctors;

if($action){
    $doctors->$action(Doctors::getConnection());
}else echo "action is required";













?>
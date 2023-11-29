<?php
include_once '../config/conn.db.php';
$action=$_POST['action'];

class Hospital extends DatabaseConnection{
public function readHospital($conn)
  {
    $response=array();
    $data=array();
    $sql="SELECT * FROM hospitals";
    if(!$conn){
        $response=array("error"=>"there is connection error","status"=>"false");
    }
    else{
        $result=$conn->query($sql);
        if($result){
            while($rows=$result->fetch_assoc()){
                $data[]=$rows;
            }
            $response=array("data"=>$data,"status"=>true);
        }
        else{
            $response=array("error"=>"there is an error connection","status"=>false);
        }
    }
    echo json_encode($response);
  }
public function deleteHospital($conn)
    {
     extract($_POST);
     $response=array();
     $sql="DELETE FROM `hospitals` WHERE hospital_id='$id'";
     if(!$conn){
       $response=array("error"=>"there is an error connection","status"=>false);
     }
     else{
        $result=$conn->query($sql);
        if($result){
            $response=array("message"=>"hospital successfully deleted","status"=>true);
        }
        else{
            $response=array("error"=>"there is an error connection","status"=>false);
        }
     }
     echo json_encode($response);
    }
    public function fetchingOne($conn){
        extract($_POST);
        $res= array();
        $data = array();
        $sql = "SELECT *from hospitals where 
        hospital_id='$id'";
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
public function updateHospital($conn)
    {
     extract($_POST);
     $response=array();
     $sql="UPDATE `hospitals` SET `name`='$name',`main_number`='$main_number',`email`='$email',`location`='$location',`description`='$description' where hospital_id='$id'";
     if(!$conn)
     {
       $response=array("error"=>"there is an error connction","status"=>false);
     }
     else
      {
        $result=$conn->query($sql);
        if($result){
            $response=array("message"=>"Doctor successfully updated","status"=>true);
        }
        else{
            $response=array("error"=>"there is an error connection","status"=>false);
        }
     }
     echo json_encode($response);
    }

public function createHospital($conn)
    {
        extract($_POST);
        $response=array();
        $sql="INSERT INTO `hospitals`(`name`, `main_number`, `email`, `location`, `description`) VALUES ('$name','$number','$email','$location','$description')";
        if(!$conn){
            $response=array("error"=>"there is an error connection","status"=>false);
        }
        try {
            $result = $conn->query($sql);
            if ($result){
                $response = array("message" => "hospital was created..", "status" => true);
                
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
    

    echo  json_encode($response);
}
    }



$hospital =new Hospital;
if($action){
    $hospital->$action(Hospital::getConnection());
}
else echo "action is required...";


?>
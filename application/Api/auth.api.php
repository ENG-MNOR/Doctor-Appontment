<?php 

include_once "../config/conn.db.php";

class Auth extends DatabaseConnection{

    public function validateAuth(mysqli $conn){

        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from admins where 
        email='$email' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if(mysqli_num_rows($result)>0){
                     while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data,"isFound"=>true);
                }else
                $res = array("message" => "success", "isFound" => false);
               
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);



    }





}

$action= $_POST['action'];
if(isset($action)){
    $auth= new Auth();
    $auth->$action(Auth::getConnection());
}



?>
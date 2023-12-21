<?php
include_once '../include/session.php';
include_once "../config/conn.db.php";
include_once './delivery_email.php';

class Auth extends DatabaseConnection
{

    public function validateAuth(mysqli $conn)
    {

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
                if (mysqli_num_rows($result) > 0) {
                    $sess_rows= $result->fetch_assoc();
                    $_SESSION['type']=$sess_rows['type'];
                    // $_SESSION['type']=$sess_rows['type'];
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }
                    $res = array("message" => "success", "data" => $data, "isFound" => true);
                } else  
                    $res = array("message" => "success", "isFound" => false);


            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);



    }
    public function validateUser(mysqli $conn)
    {

        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *FROM $table WHERE email='$email'";

        if (!$conn)
            $res = array("error" => "there is an error in the connection");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // $_SESSION['type']=$sess_rows['type'];
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }
                    $res = array("message" => "success", "data" => $data, "isFound" => true);
                } else  
                    $res = array("message" => "success", "isFound" => false);


            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);



    }
    public function loginType(mysqli $conn)
    {

        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT name,password,type from $table where 
        email='$email' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error in the connction");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                        $_SESSION['type'] = $rows["type"];
                        $_SESSION['name'] = $rows["name"];
                    }
                    $res = array("message" => "success", "data" => $data, "isFound" => true);
                } else
                    $res = array("message" => "success", "isFound" => false);


            } else {
                $res = array("error" => "there is an error in the execution");
            }
        }
        echo json_encode($res);



    }

    public function login(mysqli $conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $tables = ['doctors', 'patients'];
        // $sql = "SELECT *from doctors where 
        // name='$name' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $hasFound = false;
            foreach ($tables as $table) {
                $sql = "SELECT name,password,type from $table where 
        name='$name' AND password='$pass'";
                $result = $conn->query($sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = $result->fetch_assoc()) {
                            $_SESSION['name'] = $rows['name'];
                            $_SESSION['type'] = $rows['type'];
                            $data[] = $rows;
                            $hasFound = true;
                        }
                        if ($hasFound) {
                            $res = array("message" => "success", "data" => $data, "isFound" => true);
                            return;
                        }

                    } else
                        $res = array("message" => "success", "isFound" => false);
                } else {
                    $res = array("error" => "this is an error");
                }
            }
            ;

            echo json_encode($res);

        }
    }

    public function emailVer(mysqli $conn)
    {
        extract($_POST);
        $response = array();
        $code = rand(1000, 9999);

        $response = array();
        $sql = "SELECT *FROM $table WHERE email='$email'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $rows = mysqli_num_rows($result);
                if($rows>0)
                  {
                    $mail = new Mail();
                    $mail->setFullName('Dear User');
                    $mail->setReceiverEmail($email);
                    $mail->setMessageContent("<h2>Verification Code</h2> Your Verification Code is : $code");
                    $sent = $mail->sendEmail();
                    if ($sent) {
                        $response = array("code"=> $code,"message"=> "Check your email, the verification code was sent $email","error" => "", "isExist" => true,"data"=> $result->fetch_assoc());
                      
                    } else {
                        $response = array("message" => "doesnot sent email");
                    }
                   
                  }
                else
                $response = array("error" => "invalid Email", "isExist" => false,"data"=> "");
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
      
      
        echo json_encode($response);
    }

    public function updateUser($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `$table` SET `password`='$password' WHERE email='$email'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "User was updated Successfully", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }







}




$action = $_POST['action'];
if (isset($action)) {
    $auth = new Auth();
    $auth->$action(Auth::getConnection());
}



?>
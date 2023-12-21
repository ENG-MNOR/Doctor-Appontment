<?php
include_once '../config/conn.db.php';
include './delivery_email.php';
// header ("Content-type: application/json");
$action = $_POST['action'];

class Doctors extends DatabaseConnection
{

    public function readDoctorsHospital($conn)
    {
        $response = array();
        $data = array();
        $sql = "SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID, 
            hospitals.name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
            proffision.name as pro_name, proffision.pro_id FROM doctors
                        INNER JOIN hospitals
                        ON doctors.hospital_id=hospitals.hospital_id
                        JOIN proffision
                        on doctors.profision_id=proffision.pro_id
                        WHERE doctors.verified='YES'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }

    public function readDoctors($conn)
    {
        $response = array();
        $data = array();
        $sql = "select * from doctors";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function deleteDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "DELETE FROM doctors WHERE dr_id=$id";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully deleted", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);

    }

    public function createDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $fileName = $_FILES['profile_image']['name'];
        $ext = explode(".", $fileName)[1];
        $temp = $_FILES['profile_image']['tmp_name'];
        $newName = rand() . "." . $ext;
        $uploadedPath = "../uploads/" . $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', '$newName')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }




        echo json_encode($response);
    }
    public function registerDoctor($conn)
    {
        extract($_POST);
        $response = array();

        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', '$newName')";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor successfully created...", "status" => true);
                    } else {
                        $response = array("error" => " error connection", "Status" => false);
                    }
                }
            } else
                $response = array("error" => "there is an error during uploading", "status" => false);

        } else {
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', 'no image')";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor successfully created...", "status" => true);
                } else {
                    $response = array("error" => " error connection", "Status" => false);
                }
            }
        }
        echo json_encode($response);
    }



    public function updateDoctor($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$proffision_id',`hospital_id`='$hospital_id',`description`='$description',`profile_image`='$newName' WHERE dr_id='$id'";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor was updated", "status" => true);
                    } else {
                        $response = array("error" => "there is an error connection", "status" => false);
                    }
                }
            }

        } else {
            $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$profision_id',`hospital_id`='$hospital_id',`description`='$description' WHERE dr_id='$id'";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        }


        echo json_encode($response);
    }
    public function unverifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$unverify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is unverified know", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }
    public function verifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$verify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is verified know ✔", "status" => true);
                $sendEmailMessage="SELECT name,email from doctors where dr_id='$id';";
                $resultRow=$conn->query($sendEmailMessage);
                if($resultRow){
                   
                    $row=$resultRow->fetch_assoc(); 
                    // echo $row['name'].$row['email'];
                    $mail= new Mail();
                    $mail->setFullName($row['name']);
                    $mail->setReceiverEmail($row['email']);
                    $mail->setMessageContent("<h2> Congrats! ".$row['name']. "</h2> <p style='line-height: 1.7'>you verified from doctor apointment system, your account has been verified and now you are one of the doctors of <strong>doctor apointment</strong> system
                    of  titanic tech group. you can use this site and you can know make schedule and apointment for the petients. <strong>Welcome Again</strong></p> <a href='http://localhost:5173/login' style='text-decoration: none; padding: 10px; font-size: 16px; background: #6c3fff; color: white;'>Login Here!</a>. ");
                    $mail->sendEmail();
                    $response = array("message"=> "email is sent bye $row[email] ","status"=> true);
                }
                

            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }



    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from doctors where 
            dr_id='$id'";
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
$doctors = new Doctors;

if ($action) {
    $doctors->$action(Doctors::getConnection());
} else
    echo "action is required";













?>
<?php
include_once '../config/conn.db.php';
// header ("Content-type: application/json");
$action = $_POST['action'];

class Appointment extends DatabaseConnection
{
    public function getNumberOfAppointments($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT * FROM appointment
WHERE appo_date='$date' AND dr_id='$dr_id' AND status!='complete'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("status" => true, "rows" => mysqli_num_rows($result));
            }
        }
        echo json_encode($response);
    }
    public function getSpecificPatient($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT * FROM appointment
WHERE appo_date='$date' AND pat_id='$pat_id' AND status!='complete'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("status" => true, "rows" => mysqli_num_rows($result));
            }
        }
        echo json_encode($response);
    }
    public function loadAppointments($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT appo_id,appo_date,time,diagnose.name as diagnose,doctors.name as doctor,
        appointment.status, appointment.symptom_description FROM appointment
JOIN doctors
on doctors.dr_id=appointment.dr_id
JOIN diagnose on appointment.diagnose_id=diagnose.diganose_id
WHERE appointment.pat_id=16";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function makeAppointment($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT INTO `appointment`(`appo_date`, `time`, `diagnose_id`, `symptom_description`, `dr_id`, `pat_id`) VALUES('$appointment_date','$time','$diagnose','$description','$dr_id','$pat_id')";
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

        echo json_encode($response);
    }
    public function deleteAppointment($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM appointment WHERE appo_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "appointment has been removed...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }

    public function fetchOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from admins where 
        admin_id='$id'";
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

$doctors = new Appointment;

if ($action) {
    $doctors->$action(Appointment::getConnection());
} else echo "action is required";

<?php

include_once("../config/conn.db.php");


class Schedule extends DatabaseConnection
{

    public function loadDoctors($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from doctors where verified='Yes'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while($rows = $result->fetch_assoc())
                  $data[]=$rows;

                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function loadSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT * FROM `schedules`
                INNER JOIN doctors
                ON schedules.dr_id=doctors.dr_id";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while($rows = $result->fetch_assoc())
                  $data[]=$rows;

                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function fetchScheduleData($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT * FROM `schedules`
        INNER JOIN doctors
        ON schedules.dr_id=doctors.dr_id";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while($rows = $result->fetch_assoc())
                  $data[]=$rows;

                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function createSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "INSERT INTO `schedules`(`date`, `from_time`, `to_time`, `range_number`, `available`, `dr_id`) VALUES ('$date','$fromTime','$toTime','$range','$available','$dr_id')";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
               

                $res = array("message" => "Schedule has been assigned to Dr ID [$dr_id] (public 🌎)", "state" => true);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function deleteSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "DELETE FROM schedules where sch_id='$sch_id'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
               

                $res = array("message" => "Schedule has been deleted", "state" => true);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function updateSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "UPDATE schedules set `available`='$available' where sch_id='$sch_id';";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
               

                $res = array("message" => "Schedule State has been updated", "state" => true);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function updateAllSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "UPDATE `schedules` SET `date`='$date',`from_time`='$from_time',`to_time`='$to_time',`range_number`='$range',`duration`='$duration',`card_price`='$price' WHERE `sch_id`='$id';";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
               

                $res = array("message" => "Schedule  has been updated", "state" => true);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
   
}


$action = $_POST['action'];
if (isset($action)) {
    $counter = new Schedule();
    $counter->$action(Schedule::getConnection());
}

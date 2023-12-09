<?php

include_once("../config/conn.db.php");


class Report extends DatabaseConnection
{

    public function readReportData($conn)
    {
        extract($_POST);
        $res = array();
        $data=array();
        $sql = "CALL readReportData('$dr_id')";
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
    public function filterReportData($conn)
    {
        extract($_POST);
        $res = array();
        $data=array();
        $sql = "CALL filterReportData('$date','$status','$type','$dr')";
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
    public function countDashboardNumbers($conn)
    {
        extract($_POST);
        $res = array();
        if ($getStatus == "yes") {
            $sql = "SELECT COUNT(*) as counter from $table WHERE `status`='$status' AND `dr_id`='$id'";
            if (!$conn)
                $res = array("error" => "there is an error");
            else {
                $result = $conn->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $res = array("message" => "success", "rowNumber" => $row['counter']);
                } else {
                    $res = array("error" => "there is an error");
                }
            }
        } else {
            $sql = "SELECT COUNT(*) as counter from $table where dr_id='$id'";
            if (!$conn)
                $res = array("error" => "there is an error");
            else {
                $result = $conn->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $res = array("message" => "success", "rowNumber" => $row['counter']);
                } else {
                    $res = array("error" => "there is an error");
                }
            }
        }


        echo json_encode($res);
    }

    public function unverifiedDoctors($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT * FROM `doctors`
                 WHERE  `verified`='No' LIMIT 5";
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


$action = $_POST['action'];
if (isset($action)) {
    $counter = new Report();
    $counter->$action(Report::getConnection());
}

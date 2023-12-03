<?php

include_once("../config/conn.db.php");


class Counters extends DatabaseConnection
{

    public function count($conn)
    {
        extract($_POST);
        $res = array();
        $sql = "SELECT COUNT(*) as counter from $table";
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
       
        echo json_encode($res);
    }
    public function unverifiedDoctors($conn)
    {
        extract($_POST);
        $res = array();
        $data=array();
        $sql = "SELECT * FROM `doctors`
                 WHERE  `verified`='No' LIMIT 5";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while($rows = $result->fetch_assoc()){
                        $data[]=$rows;
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
    $counter = new Counters();
    $counter->$action(Counters::getConnection());
}

<?php
    require("database.php");
    session_start();
    if(isset($_POST["get-available-providers"]) && isset($_SESSION["patient_user"])) {
        // variables
        $state = "";
        $message = "";
        $providers = array();
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check available providers
            $query = "SELECT name, username FROM healthcare_provider WHERE available = 'YES';";
            $statement = mysqli_prepare($conn, $query);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            // get providers
            if(mysqli_num_rows($result) >= 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    $providers[] = $row;
                }
            } else {
                $message = "No available healthcare providers.";
            }
        }
        $data = array(
            'state' => $state,
            'message' => $message,
            'providers' => $providers
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    } else if(isset($_POST["patient-logout"]) && isset($_SESSION["patient_user"])) {
        unset($_SESSION["patient_user"]);
    } else if(isset($_POST["get-appointments"]) && isset($_SESSION["patient_user"])) {
        // variables
        $state = "";
        $message = "";
        $appointments = array();
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // submit appointment
            $query = "SELECT appointment_id, healthcare_provider, message, date, accepted FROM appointments WHERE patient = ? ORDER BY date ASC";
            $statement = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($statement, "s", $_SESSION["patient_user"]);
            mysqli_stmt_execute($statement);
            $result = mysqli_stmt_get_result($statement);
            // get providers
            if(mysqli_num_rows($result) >= 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    $appointments[] = $row;
                }
            } else {
                $message = "No available healthcare providers.";
            }
        }
        $data = array(
            'state' => $state,
            'message' => $message,
            'appointments' => $appointments
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    } else if(isset($_POST["submit-appointment"]) && isset($_SESSION["patient_user"])) {
        // variables
        $state = "";
        $message = "";
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // submit appointment
            $provider = $_POST["provider"];
            $date = $_POST["date"];
            $message = $_POST["message"];
            $query = "INSERT INTO appointments(patient, healthcare_provider, message, date) VALUES (?, ?, ?, ?);";
            $statement = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($statement, "ssss", $_SESSION["patient_user"], $provider, $message, $date);
            mysqli_stmt_execute($statement);
            $state = 'success';
            $message = 'Appointment successfully scheduled.';
        }
        $data = array(
            'state' => $state,
            'message' => $message,
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    }
?>
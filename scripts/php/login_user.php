<?php
    require("database.php");
    // variables
    $state = "";
    $message = "";
    if(isset($_POST["login_user"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $username = $_POST["username"];
            $password = $_POST["password"];
            $query_patient = "SELECT username, password FROM patient WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $username);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_provider = "SELECT username, password FROM healthcare_provider WHERE username = ?;";
            $statement_provider = mysqli_prepare($conn, $query_provider);
            mysqli_stmt_bind_param($statement_provider, "s", $username);
            mysqli_stmt_execute($statement_provider);
            $result_provider = mysqli_stmt_get_result($statement_provider);
            // query
            if(mysqli_num_rows($result_patient) == 1) {
                $patient = mysqli_fetch_assoc($result_patient);
                if(password_verify($password, $patient["password"])) {
                    session_start();
                    $_SESSION["patient_user"] = $patient["username"];
                    $state = "patient-login-success";
                } else {
                    $message = "Incorrect patient password entered.";
                }
            } else if(mysqli_num_rows($result_provider) == 1) {
                $provider = mysqli_fetch_assoc($result_provider);
                if(password_verify($password, $provider["password"])) {
                    session_start();
                    $_SESSION["provider_user"] = $provider["username"];
                    $state = "healthcare-provider-login-success";
                } else {
                    $message = "Incorrect healthcare provider password entered.";
                }
            } else {
                $message = "Username not recognized.";
            }
        }
        $data = array(
            'state' => $state,
            'message' => $message
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    }
?>
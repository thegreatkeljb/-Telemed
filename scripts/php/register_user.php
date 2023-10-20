<?php
    require("database.php");
    // variables
    $state = "";
    $message = "";
    if(isset($_POST["register_patient"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $user = $_POST["username"];
            $query_patient = "SELECT patient_id FROM patient WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $user);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_provider = "SELECT provider_id FROM healthcare_provider WHERE username = ?;";
            $statement_provider = mysqli_prepare($conn, $query_provider);
            mysqli_stmt_bind_param($statement_provider, "s", $user);
            mysqli_stmt_execute($statement_provider);
            $result_provider = mysqli_stmt_get_result($statement_provider);
            // query
            if(mysqli_num_rows($result_patient) == 0 && mysqli_num_rows($result_provider) == 0) {
                $name = $_POST["name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO patient(name, username, password, email) VALUES (?, ?, ?, ?);";
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($statement, "ssss", $name, $username, $password_hash, $email);
                mysqli_stmt_execute($statement);
                $state = "patient-registration-success";
                $message = "Patient Registration Successful!";
            } else {
                $state = "failed";
                $message = "Username is already taken";
            }
        }
        $data = array(
            'state' => $state,
            'message' => $message
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    } else if(isset($_POST["register_healthcare_provider"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $message = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $user = $_POST["username"];
            $query_patient = "SELECT patient_id FROM patient WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $user);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_provider = "SELECT provider_id FROM healthcare_provider WHERE username = ?;";
            $statement_provider = mysqli_prepare($conn, $query_provider);
            mysqli_stmt_bind_param($statement_provider, "s", $user);
            mysqli_stmt_execute($statement_provider);
            $result_provider = mysqli_stmt_get_result($statement_provider);
            // query
            if(mysqli_num_rows($result_patient) == 0 && mysqli_num_rows($result_provider) == 0) {
                $name = $_POST["name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO healthcare_provider(name, username, password, email) VALUES (?, ?, ?, ?);";
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($statement, "ssss", $name, $username, $password_hash, $email);
                mysqli_stmt_execute($statement);
                $state = "healthcare-provider-registration-success";
                $message = "Healthcare Provider Registration Successful!";
            } else {
                $state = "failed";
                $message = "Username is already taken";
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
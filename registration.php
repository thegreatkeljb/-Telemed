<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/style.css">   
    <title>Telemed Registration</title>
</head>
<body>
<section id="main">
        <div class="container">
            <div class="row justify-content-center custom-no-gutters">
                <div class="col-5">
                    <div class="reg_box">
                        <h3>Create Account</h3>
                        <form class="home_form">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                                <label name="name" class="form-label">NAME</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="uname" placeholder="Name">
                                <label name="uname" class="form-label">USERNAME</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label name="email" class="form-label">EMAIL ADDRESS</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <label name="password" class="form-label">PASSWORD</label>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="userpriv">
                                    <option selected hidden>SELECT PRIVILEGE</option> <!-- THIS SHOULD BE INVALID REGISTRATION -->
                                    <option>PATIENT</option> <!-- IF USER IS PATIENT -->
                                    <option>HEALTHCARE PROVIDER</option> <!-- IF USER IS DOCTOR -->
                                </select>
                            </div>
                            <button class="btn btn-primary" id="regbutton">REGISTER</button> <!-- BUTTON FOR REGISTRATION -->
                            <a class="btn btn-light" href="index.php">RETURN</a>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <script src="scripts/javascript/registration.js"></script>
</body>
</html>
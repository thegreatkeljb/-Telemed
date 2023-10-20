<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/healthcare.css">
    <title>Telemed Healthcare Provider</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand ml-auto custom_logo" href="#"><alt="" class="navbar_icon">Telemed Healthcare Provider</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="holder">
                    <button class="btn btn-success" id="btn_avail">Available</button>
                    <a class="btn btn-light">Logout</a>
                </div> 
            </div>
        </nav>
    </header>
    <main>
        <section id="req_appoints">
            <div class="container">
                <div class="row">
                    <h5>Requested Appointments</h5>
                    <div class="requests">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Name">
                            <input type="text" class="form-control" placeholder="Message">
                            <input type="date" class="form-control col-xs-3" id="dateappt" placeholder="Name">
                            <button class="btn btn-success" type="button">Approve</button>
                            <button class="btn btn-danger" type="button">Cancel</button>
                        </div> 
                    </div>         
                </div>
            </div>
        </section>
        <section id="appointments">
            <div class="container">
                <div class="row">
                    <h5>Your Appointments Schedule:</h5>
                    <div class="appointments-sched" id="appointments">
                    <!-- SCHED LOGIC     -->
                    </div>    
                </div>    
            </div>
        </section>
    </main>
</body>
</html>
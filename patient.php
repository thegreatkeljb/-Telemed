<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/patient.css">
    <title>Telemed Patient</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand ml-auto custom_logo" href="#"><alt="" class="navbar_icon">Telemed Patient</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="users">
                    <a class="btn btn-light">Logout</a>
                </div> 
            </div>
        </nav>
    </header>
    <main>
        <section id="appointment">
            <div class="container">
                <div class="row">
                    <h5>Your Appointment Schedule:</h5>
                    <div class="appointments-sched" id="appointments">
                    <!-- SCHED LOGIC     -->
                    </div>    
                </div>    
                <h5>Schedule Appointment</h5>
                <form class="home_form mt-4">
                    <div class="form-select">
                        <select class="form-control" id="hcprovider">
                            <option selected hidden>HEALTH CARE PROVIDER</option>
                            
                        </select>
                    </div>
                    <div class="form-floating mt-4">
                        <input type="date" class="form-control" id="dateappt" placeholder="Name">
                        <label name="date" class="form-label">DATE OF APPOINTMENT</label>
                    </div>
                    <div class="form-group mt-4">
                        <label name="password" class="form-label"><h6>Message:</h6></label>
                        <textarea class="form-control" id="message" rows="5">Describe your condition</textarea>
                    </div>
                    <button class="btn btn-primary mt-4" id="send">SUBMIT</button>
                </form>
            </div>
        </section>
        <section id="overlay">
            <div class="container">
                <div class="row">
                    sadsadasdas
                </div>
            </div>

        </section>
    </main>
</body>
</html>
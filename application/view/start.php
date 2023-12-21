<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon.png">
    <link href="../../css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Ragister an account</h4>
                                    <form >
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block patient">Ragister as
                                                apetient</button>
                                                <!-- <button class="btn btn-primary patient">patient</button> -->
                                        </div><br>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block Doctor">Ragister as
                                                Doctor</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>if you have an account? <a class="text-primary"
                                                href="./page-register.html">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../../vendor/global/global.min.js"></script>
    <script src="../../js/quixnav-init.js"></script>
    <script src="../../js/custom.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".patient").click(function (event) {
               event.preventDefault();
                // alert("entered")
                window.location.href = "./register_patient.php";
            })
            $(".Doctor").click(function (event) {
                            event.preventDefault();
                            window.location.href = "./register_doctor.php";
                        })
        })

    </script>

</body>

</html>
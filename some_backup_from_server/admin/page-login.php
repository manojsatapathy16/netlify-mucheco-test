<?php
session_start();
if (isset($_SESSION["logedIn"]) && $_SESSION["logedIn"]) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mucheco - Login</title>
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <style>
        .bg-blue {
            background: #0f0c29;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #24243e, #302b63, #0f0c29);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .m-auto {
            margin: auto;
        }
    </style>
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header bg-blue text-center">
                <img src="assets/img/logo.png" alt="" srcset="">
            </div>
            <div class="card-body">
                <form id="login-form">
                    <div class="form-group mb-2">
                        <label for="username"><strong>Username</strong></label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password"><strong>Password</strong></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <button id="login-btn" class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/localization/messages_ar.min.js" integrity="sha512-nb2K94mYysmXkqlnVuBdOagDjQ2brfrCFIbfDIwFPosVjrIisaeYDxPvvr7fsuPuDpqII0fwA51IiEO6GulyHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="assets/js/sb-admin-2.min.js"></script> -->

    <script>
        $(document).ready(() => {
            $("#login-form").submit((e) => {
                e.preventDefault();
                let username = $("#username").val();
                let password = $("#password").val();

                var isValid = validator.form();
                if (isValid) {
                    var formdata = new FormData();
                    formdata.append("username", username);
                    formdata.append("password", password);

                    $.ajax({
                        "url": "controller/User/login.php",
                        "method": "POST",
                        "timeout": 0,
                        "processData": false,
                        "mimeType": "multipart/form-data",
                        "contentType": false,
                        "data": formdata,
                        success: function(response) {
                            response = JSON.parse(response);
                            if (response.status == 1) {
                                // alert(response.message);
                                window.location.href = 'index.php';
                            } else if (response.status == 0) {
                                alert(response.message);
                            }
                        },
                    });
                }

            })
            validator = $('#login-form').validate({
                rules: {
                    'username': {
                        required: true,
                        minlength: 3,
                        maxlength: 15
                    },
                    'password': {
                        required: true,
                        minlength: 3
                    }
                },
                messages: {
                    'username': {
                        required: "Username is required",
                        minlength: "Username can not be less than 3 character",
                        maxlength: "Username cannot be greater than 15 character"
                    },
                    'password': {
                        required: "Password is required",
                        minlength: "Password can not be less than 3 character",
                    }
                }
            });
        })
    </script>
</body>

</html>
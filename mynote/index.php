<?php

include './portal/connection.php';

session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: ./portal/user.php");
    exit();
} else {
    if (isset($_POST['user_login'])) {
        $data_user_name = $_POST['user'];
        $data_password = $_POST['pwd'];

        // select query.
        $select_query = "SELECT * FROM login where emails='$data_user_name'";
        $result = mysqli_query($con, $select_query);
        $row_data = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($data_user_name == $row_data['emails'] && $data_password == $row_data['passwords']) {
            // session checking
            $_SESSION['logged_in'] = true;
            $_SESSION['emails'] = $data_user_name;

            header('Refresh: 3; ./portal/user.php');
            exit();
        } else {
            echo '
                <script>
                    alert("login failed");
                </script>
        ';
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="https://www.apk20.com/_next/image?url=https%3A%2F%2Fplay-lh.googleusercontent.com%2FCWyr39QA5BwmkKKYx7XHD2N5l3_qVDqQBle7IoUNSmkvOms6L9GG10N1LIFXuPf2qRHW%3Dh250-rw%3Fcompress&w=640&q=100" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Note</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Alkatra:wght@700&family=Lobster&display=swap');

    body {
        background-color: black;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        background-color: black;
    }

    form {
        max-width: 350px;
        vertical-align: middle;
        margin-top: 15vmin;
        height: auto;
        outline: invert;
        border-color: rgb(87, 86, 86) !important;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .head1 {
        font-family: 'Lobster', cursive;
        color: rgba(15, 123, 248, 0.99);
        font-weight: bolder;
    }

    input {
        border-color: rgb(87, 86, 86) !important;
        color: white !important;
    }

    button {
        color: white !important;
        font-weight: 800;
    }

    label {
        margin-bottom: 2px;
        text-align: left;
        padding: 2px;
        color: white;
        text-transform: capitalize;
    }
</style>


<body>
    <div class="container">
        <center>
            <form action="" method="post" class="bg-dark form-control" enctype="multipart/form-data" autocomplete="off">
                <h3 class="head1 mt-2 mb-2" id="head1">My Notes</h3>
                <br>
                <i class="fa fa-user-circle-o fa-3x" style="color: rgba(15, 123, 248, 0.99) !important;" id="user"></i>
                <br>
                <div class="details p-3">
                    <div class="row">
                        <label for="">email</label>
                        <input type="email" name="user" id="" class="form-control bg-dark" placeholder="enter email address" required>
                    </div>
                    <br>
                    <div class="row">
                        <label for="">password</label>
                        <input type="text" name="pwd" id="" class="form-control bg-dark" placeholder="password" required>
                    </div>
                    <br>
                    <div class="row">
                        <button type="submit" class="btn form-control" id="btn1" style="background-color: rgba(15, 123, 248, 0.99);" name="user_login">Signin</button>
                    </div>
                    <br>
                    <div class="row">
                        <p style="color: white;">
                            Don't Have Account? <a href="./register.php">Create Account</a>
                        </p>
                    </div>
                    <br>
                    <hr style="color: white;">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" style="background-color: orangered; height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" style="background-color: rgb(242, 0, 255); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" style="background-color: rgb(13, 146, 90); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4" style="background-color: rgb(13, 146, 90); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5" style="background-color: green; height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

                    </div>
                </div>
            </form>
        </center>
    </div>
</body>

<script type="text/javascript">
    // color mode
    function colorMode(id) {
        if (id === "inlineRadio1") {
            document.getElementById("user").style.color = "orangered";
            document.getElementById("head1").style.color = "orangered";
            document.getElementById("btn1").style.backgroundColor = "orangered";
        } else if (id === "inlineRadio2") {
            document.getElementById("user").style.color = "rgb(242, 0, 255)";
            document.getElementById("head1").style.color = "rgb(242, 0, 255)";
            document.getElementById("btn1").style.backgroundColor = "rgb(242, 0, 255)";
        } else if (id === "inlineRadio3") {
            document.getElementById("user").style.color = "rgb(1, 210, 123)";
            document.getElementById("head1").style.color = "rgb(1, 210, 123)";
            document.getElementById("btn1").style.backgroundColor = "rgb(1, 210, 123)";
        } else if (id === "inlineRadio4") {
            document.getElementById("user").style.color = "rgb(13, 146, 90)";
            document.getElementById("head1").style.color = "rgb(13, 146, 90)";
            document.getElementById("btn1").style.backgroundColor = "rgb(13, 146, 90)";
        } else if (id === "inlineRadio5") {
            document.getElementById("user").style.color = "green";
            document.getElementById("head1").style.color = "green";
            document.getElementById("btn1").style.backgroundColor = "green";
        } else {
            document.getElementById("user").style.color = "rgba(15, 123, 248, 0.99)";
            document.getElementById("head1").style.color = "rgba(15, 123, 248, 0.99)";
            document.getElementById("btn1").style.backgroundColor = "rgba(15, 123, 248, 0.99)";
        }
    }
</script>

</html>
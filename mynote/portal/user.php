<?php

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" href="https://www.apk20.com/_next/image?url=https%3A%2F%2Fplay-lh.googleusercontent.com%2FCWyr39QA5BwmkKKYx7XHD2N5l3_qVDqQBle7IoUNSmkvOms6L9GG10N1LIFXuPf2qRHW%3Dh300-rw%3Fcompress&w=640&q=100" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Note</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Alkatra:wght@700&family=Lobster&display=swap');

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        border: 1px solid rgb(18, 17, 17);
        margin-top: 6rem;
        height: auto;
        max-width: 1100px;
        padding: 10px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    .head1 {
        font-family: 'Lobster', cursive;
        color: rgba(15, 123, 248, 0.99);
        font-weight: bolder;
        text-align: center;
    }

    .fa {
        border: rgba(15, 123, 248, 0.99) 2px solid;
        height: 120px;
        width: 120px;
        color: rgba(15, 123, 248, 0.99);
        padding: 35px;
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        border-radius: 100%;
    }
</style>


<body class="bg-dark">
    <div class="container p-2 bg-dark">
        <div class="row">
            <h3 class="head1 mt-2 mb-2" id="head1">My Notes Admin Panel</h3>
        </div>
        <br><br>
        <center>
            <div class="row p-3 mt-3">
                <div class="col-sm-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Previous notes">
                    <a href="./notes.php">
                        <i class="fa fa-user fa-3x" id="user">
                        </i>
                    </a>
                </div>
                <div class="col-sm-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Write your note">
                    <a href="./write.php">
                        <i class="fa fa-file-text fa-3x" id="old"></i>
                    </a>
                </div>
                <div class="col-sm-4" data-bs-toggle="tooltip" data-bs-placement="top" title="sign out">
                    <a href="./logout.php">
                        <i class="fa fa-sign-out fa-3x" id="out"></i>
                    </a>
                </div>
            </div>
        </center>
        <br><br><br><br>
        <center>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" style="background-color: orangered; height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" style="background-color: rgb(242, 0, 305); height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" style="background-color: rgb(173, 83, 247); height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4" style="background-color: rgb(13, 146, 90); height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5" style="background-color: green; height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6" style="background-color:gold; height: 30px; width: 30px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
        </center>
        <br>
    </div>
</body>


<script type="text/javascript">
    // color mode
    function colorMode(id) {
        if (id === "inlineRadio1") {
            document.getElementById("head1").style.color = "orangered";

            document.getElementById("user").style.border = "2px solid orangered";
            document.getElementById("user").style.color = "orangered";

            document.getElementById("old").style.color = "orangered";
            document.getElementById("old").style.border = "2px solid orangered";

            document.getElementById("out").style.color = "orangered";
            document.getElementById("out").style.border = "2px solid orangered";

        } else if (id === "inlineRadio2") {
            document.getElementById("head1").style.color = "rgb(242, 0, 255)";

            document.getElementById("user").style.border = "2px solid rgb(242, 0, 255)";
            document.getElementById("user").style.color = "rgb(242, 0, 255)";

            document.getElementById("old").style.color = "rgb(242, 0, 255)";
            document.getElementById("old").style.border = "2px solid rgb(242, 0, 255)";

            document.getElementById("out").style.color = "rgb(242, 0, 255)";
            document.getElementById("out").style.border = "2px solid rgb(242, 0, 255)";


        } else if (id === "inlineRadio3") {
            document.getElementById("head1").style.color = "rgb(173, 83, 247)";

            document.getElementById("user").style.border = "2px solid rgb(173, 83, 247)";
            document.getElementById("user").style.color = "rgb(173, 83, 247)";

            document.getElementById("old").style.color = "rgb(173, 83, 247)";
            document.getElementById("old").style.border = "2px solid rgb(173, 83, 247)";

            document.getElementById("out").style.color = "rgb(173, 83, 247)";
            document.getElementById("out").style.border = "2px solid rgb(173, 83, 247)";
        } else if (id === "inlineRadio4") {
            document.getElementById("head1").style.color = "rgb(13, 146, 90)";

            document.getElementById("user").style.border = "2px solid rgb(13, 146, 90)";
            document.getElementById("user").style.color = "rgb(13, 146, 90)";

            document.getElementById("old").style.color = "rgb(13, 146, 90)";
            document.getElementById("old").style.border = "2px solid rgb(13, 146, 90)";

            document.getElementById("out").style.color = "rgb(13, 146, 90)";
            document.getElementById("out").style.border = "2px solid rgb(13, 146, 90)";
        } else if (id === "inlineRadio5") {
            document.getElementById("head1").style.color = "green";

            document.getElementById("user").style.border = "2px solid green";
            document.getElementById("user").style.color = "green";

            document.getElementById("old").style.color = "green";
            document.getElementById("old").style.border = "2px solid green";

            document.getElementById("out").style.color = "green";
            document.getElementById("out").style.border = "2px solid green";

        } else if (id === "inlineRadio6") {
            document.getElementById("head1").style.color = "gold";

            document.getElementById("user").style.border = "2px solid gold";
            document.getElementById("user").style.color = "gold";

            document.getElementById("old").style.color = "gold";
            document.getElementById("old").style.border = "2px solid gold";

            document.getElementById("out").style.color = "gold";
            document.getElementById("out").style.border = "2px solid gold";
        }
    }
</script>

</html>
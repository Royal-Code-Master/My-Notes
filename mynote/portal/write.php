<?php

include './connection.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}
$e = $_SESSION['emails'];

if (isset($_POST['save'])) {

    $d = $_POST['d'];
    $n = $_POST['n'];

    $note_save = "INSERT INTO notebook (mt,note, mails) VALUES ('$d','$n','$e')";

    if (mysqli_query($con, $note_save)) {
        echo '
                <script>
                    alert("Note Saved Successfully");
                </script>
        ';
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
        margin-top: 4rem;
        height: auto;
        max-width: 1100px;
    }

    .head1 {
        font-family: 'Lobster', cursive;
        color: rgba(15, 123, 248, 0.99);
        font-weight: bolder;
        text-align: center;
    }

    form {
        max-width: 950px;
        vertical-align: middle;
        margin-top: 8vmin;
        height: auto;
        outline: invert;
        border-color: rgb(87, 86, 86) !important;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    input {
        border-color: rgb(87, 86, 86) !important;
        color: white !important;
    }

    label {
        margin-bottom: 2px;
        text-align: left;
        padding: 2px;
        color: white;
        text-transform: capitalize;
    }

    textarea {
        border-color: rgb(87, 86, 86) !important;
        color: white !important;
    }
</style>


<body>
    <div class="container p-2 bg-dark">
        <div class="row">
            <h3 class="head1 mt-2 mb-2" id="head1">My Notes</h3>
        </div>
        <center>
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="form-control bg-dark">
                <div class="msg p-3">
                    <div class="row">
                        <label for="">Message Description</label>
                        <input type="text" name="d" id="" class="form-control bg-dark" placeholder="enter email address">
                    </div>
                    <div class="row mt-3">
                        <label for="">Write Message</label>
                        <textarea name="n" id="" cols="30" rows="7" class="form-control bg-dark" placeholder="write your message here ..........."></textarea>
                    </div>
                    <div class="row mt-3 mb-1">
                        <button type="submit" class="btn" id="btn1" style="background-color: rgba(10, 108, 219, 0.99);color: white;font-weight: 800;" name="save">Save Note</button>
                    </div>
                </div>
            </form>
        </center>
        <br>
        <center>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" style="background-color: orangered; height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" style="background-color: rgb(242, 0, 255); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" style="background-color: rgb(173, 83, 247); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4" style="background-color: rgb(13, 146, 90); height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5" style="background-color: green; height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio6" value="option6" style="background-color:gold; height: 25px; width: 25px;border: 2px solid whitesmoke !important;" onclick="colorMode(this.id);">

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
            document.getElementById("btn1").style.backgroundColor = "orangered";
            document.getElementById("btn1").style.color = "white";
        } else if (id === "inlineRadio2") {
            document.getElementById("head1").style.color = "rgb(242, 0, 255)";
            document.getElementById("btn1").style.backgroundColor = "rgb(242, 0, 255)";
            document.getElementById("btn1").style.color = "white";
        } else if (id === "inlineRadio3") {
            document.getElementById("head1").style.color = "rgb(173, 83, 247)";
            document.getElementById("btn1").style.backgroundColor = "rgb(173, 83, 247)";
            document.getElementById("btn1").style.color = "white";
        } else if (id === "inlineRadio4") {
            document.getElementById("head1").style.color = "rgb(13, 146, 90)";
            document.getElementById("btn1").style.backgroundColor = "rgb(13, 146, 90)";
            document.getElementById("btn1").style.color = "white";
        } else if (id === "inlineRadio5") {
            document.getElementById("head1").style.color = "green";
            document.getElementById("btn1").style.backgroundColor = "green";
            document.getElementById("btn1").style.color = "white";
        } else if (id === "inlineRadio6") {
            document.getElementById("head1").style.color = "gold";
            document.getElementById("btn1").style.backgroundColor = "gold";
            document.getElementById("btn1").style.color = "black";
        }
    }
</script>

</html>
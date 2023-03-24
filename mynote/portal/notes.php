<?php

include './connection.php';


session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}
$e = $_SESSION['emails'];
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

    table {
        margin-top: 3rem;
        max-width: 800px;
    }

    th {
        color: white;
        text-align: center;
    }
    td{
        color: white;
    }
</style>


<body>
    <div class="container p-2 bg-dark">
        <div class="row">
            <h3 class="head1 mt-2 mb-2" id="head1">My Notes</h3>
        </div>
        <div class="table-responsive">
            <center>
                <table class="table table-bordered table-hover">
                    <thead id="ths" style="background-color: rgba(15, 123, 248, 0.99);">
                        <th>SI</th>
                        <th>Meta Data</th>
                        <th>Your Notes</th>
                        <th>Date of Creation</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $query = " SELECT * FROM notebook where mails = '$e' ";
                        $query_run = mysqli_query($con, $query);
                        $count = mysqli_num_rows($query_run);
                        if ($count > 0) {
                            foreach ($query_run as $items) {
                                $i = $i + 1;
                        ?>
                                <tr>

                                    <td><?php echo $i ?></td>
                                    <td><?php echo $items['mt'] ?></td>
                                    <td><?php echo $items['note'] ?></td>
                                    <td><?php echo $items['joined'] ?></td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr id="not">
                                <td colspan="4" style="color: white;">
                                    <center style="font-family:Cambria;">
                                        Alert msessage : No data is available right now.
                                    </center>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </center>
        </div>
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
        </center>
        <br>
    </div>
</body>

<script type="text/javascript">
    // color mode
    function colorMode(id) {
        if (id === "inlineRadio1") {
            document.getElementById("head1").style.color = "orangered";
            document.getElementById("ths").style.backgroundColor = "orangered";
            document.getElementById("ths").style.color = "white";
        } else if (id === "inlineRadio2") {
            document.getElementById("head1").style.color = "rgb(242, 0, 255)";
            document.getElementById("ths").style.backgroundColor = "rgb(242, 0, 255)";
            document.getElementById("ths").style.color = "white";
        } else if (id === "inlineRadio3") {
            document.getElementById("head1").style.color = "rgb(173, 83, 247)";
            document.getElementById("ths").style.backgroundColor = "rgb(173, 83, 247)";
            document.getElementById("ths").style.color = "white";
        } else if (id === "inlineRadio4") {
            document.getElementById("head1").style.color = "rgb(13, 146, 90)";
            document.getElementById("ths").style.backgroundColor = "rgb(13, 146, 90)";
            document.getElementById("ths").style.color = "white";
        } else if (id === "inlineRadio5") {
            document.getElementById("head1").style.color = "green";
            document.getElementById("ths").style.backgroundColor = "green";
            document.getElementById("ths").style.color = "white";
        }
    }
</script>

</html>
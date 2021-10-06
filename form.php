<?php

    include ("connection.php");
    error_reporting(0);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>

    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- sweet alert link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  


    <style>
        .main{
            /* background-image: url("images/security8.jfif"); */
            background: linear-gradient(to bottom right, red, blue);
        }

        form{
            background-color: rgb(0,0,0,0.5);
            margin: 5rem auto 2rem;
        }

        @media (max-width: 500px){
            form{
                width: 20rem;
                margin: 7rem auto 5rem;
            }
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href=""><img class="logo" src="images/bank.png"> TSF Bank</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.thesparksfoundationsingapore.org/">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.thesparksfoundationsingapore.org/contact-us/">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <form action="form.php" method="POST">
            <label class="fields">Name :</label>
            <input class="fields" type="text" name="name" required placeholder="Enter Your Name"><br>
            <label class="fields">e-mail :</label>
            <input class="fields" type="email" name="email" required placeholder="Enter Your email Id"><br>
            <label class="fields">Acc No :</label>
            <input class="fields" type="number" name="acc" required placeholder="Enter Account Number"><br>
            <label class="fields">Balance (Rs.):</label>
            <input class="fields" type="number" name="bal" required step="0.01" min="1" placeholder="Enter Current Balance"><br>
            <input class="fields btn-success" type="submit" name="submit">
        </form>
    </div>

</body>

</html>


<?php
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $acc = $_POST['acc'];
    $bal = $_POST['bal']; 

    $query = "INSERT INTO `user`(`Name`, `email Id`, `Account Number`, `Current Balance`, `Date and Time`) VALUES ('$name','$email','$acc','$bal',current_timestamp());";

    $data = mysqli_query($con, $query);

    if($data){
    ?>
        <script type="text/javascript">
        swal({
            title: "Welcome Aboard!",
            text: "Your Form is Submitted Successfully",
            icon: "success",
            button: "ok",
          });
        </script>
    <?php
    }
    else{
        echo "Data Insertion Failed";
    }
}
?>
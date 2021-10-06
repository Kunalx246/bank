<?php
    include("connection.php");
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Form</title>

    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- sweet alert link -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .main{
            background-image: url("images/security1.jfif");
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
        <form action="transaction.php" method="POST">

            <label class="fields">Your Name </label>
            <select class="fields" type="text" id="select1" name="s_name" required onchange="getSelectValue1(this.value)" placeholder="Select Your Name">
                <option>--Select--</option>

                <?php
                    $query = "SELECT Id,Name FROM user";
                    $data = mysqli_query($con, $query);
                    //$result = mysqli_fetch_assoc($data);

                    while($result = mysqli_fetch_assoc($data)){
                        echo "<option value=".$result['Name'].">".$result['Name']."</option>";
                    }
                ?>
            </select><br>

            <!-- <label class="fields">Account Number:</label>
            <input class="fields" type="number" id="acc1" name="s_acc" required placeholder="Your Account Number"><br> -->

            <label class="fields">Transfer To </label>
            <select class="fields" type="text" id="select2" name="r_name" required onchange="getSelectValue2(this.value)" placeholder="Select Recepient Name">
                <option>--Select--</option>

                <?php
                    $query = "SELECT Id, Name FROM user";
                    $data = mysqli_query($con, $query);
                    //$result = mysqli_fetch_assoc($data);

                    while($result = mysqli_fetch_assoc($data)){
                        echo "<option value=".$result['Name'].">".$result['Name']."</option>";
                    }
                ?>
                
            </select><br>

            <!-- <label class="fields">Recepient Acc No:</label>
            <input class="fields" type="number" id="acc2" name="r_acc" required placeholder="Receipient Account Number"><br> -->

            <label class="fields">Amount  Rs:</label>
            <input class="fields" type="number" id="amt" name="amt" required step="0.01" min="1" placeholder="Enter amount"><br>

            <input class="fields submit btn-success" type="submit" name="submit">
        </form>
    </div>


    <script>
        function getSelectValue1(select1){
            if(select1)
                $("#select2 option[value = '"+select1+"']").hide()
                $("#select2 option[value != '"+select1+"']").show()
        }

        function getSelectValue2(select2){
            if(select2)
                $("#select1 option[value = '"+select2+"']").hide()
                $("#select1 option[value != '"+select2+"']").show()
        }
    </script>
    
</body>

</html>



<?php
if(isset($_POST['s_name'])){
    $s_name = $_POST['s_name'];
    //$s_acc = $_POST['s_acc'];
    $r_name = $_POST['r_name'];
    //$r_acc = $_POST['r_acc'];
    $amt = $_POST['amt'];

    $query = "SELECT * FROM `user` WHERE Name = '$s_name';";
    $data = mysqli_query($con, $query);
    $result1 = mysqli_fetch_assoc($data);
    $acc1 = $result1['Account Number'];
    $bal1 = $result1['Current Balance'];

    $query = "SELECT * FROM `user` WHERE Name = '$r_name';";
    $data = mysqli_query($con, $query);
    $result2 = mysqli_fetch_assoc($data);
    $acc2 = $result2['Account Number'];
    $bal2 = $result2['Current Balance'];

    if( $amt >= $result1['Current Balance'] ){
?>
        <script type="text/javascript">
            swal({
                title: "Transaction Failed!",
                text: "Not Enough Balance",
                icon: "error",
                button: "ok",
            });
        </script>
<?php        
    }
    else{
    $query = "INSERT INTO `history`(`s_name`, `s_acc`, `r_name`, `r_acc`, `amt`, `Date and Time`) VALUES ('$s_name', '$acc1','$r_name', '$acc2','$amt', current_timestamp());";
    $data = mysqli_query($con, $query);

    $new_bal1 = $bal1 - $amt;
    $new_bal2 = $bal2 + $amt;

    $query = "UPDATE `user` SET `Current Balance`='$new_bal1' WHERE Name = '$s_name';";
    $data = mysqli_query($con, $query);
    
    $query = "UPDATE `user` SET `Current Balance`='$new_bal2' WHERE Name = '$r_name';";
    $data = mysqli_query($con, $query);

    if($data){
    ?>
        <script type="text/javascript">
        swal({
            title: "Success!",
            text: "Your Transaction was successful",
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
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction History</title>

  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css?v=<?php echo time();?>">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


</head>

<body style="background-color: rgb(172, 255, 227);">

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

    <h1 class="user-history">Transaction History</h1>

    <table>
        <tr>
            <th>Id</th>
            <th>Sender Name</th>
            <th>Sender Acc No</th>
            <th>Receipient Name</th>
            <th>Receipient Acc No</th>
            <th>Amount Sent (Rs)</th>
            <th>Date and Time</th>
        </tr>


    <?php
    error_reporting(0);
    include("connection.php");
    $query = "SELECT * FROM history";
    $data = mysqli_query($con, $query);
    $total = mysqli_num_rows($data);
    // echo "$total";             shows no. of rows
        

    if($total!=0){
        //echo "Table has records";
        //$result = mysqli_fetch_assoc($data);
        while($result = mysqli_fetch_assoc($data)){
            echo 
            "<tr>
            <td>".$result['Id']."</td>
            <td>".$result['s_name']."</td>
            <td>".$result['s_acc']."</td>
            <td>".$result['r_name']."</td>
            <td>".$result['r_acc']."</td>
            <td>".$result['amt']."</td>
            <td>".$result['Date and Time']."</td>
            </tr>";
        }
        
    }
    else{
        echo "No records found";
    }

    ?>

</table>

</body>

</html>
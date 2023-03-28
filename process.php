<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link  rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css" />
</head>
<body>
<div class = "container">
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$mobno = $_POST["mobno"];
$password = $_POST["password"];
$confirmpass = $_POST["password2"];
$flag = 0;
if(empty($name) or empty($email) or empty($address) or empty($mobno) or empty($password))
 { echo '<script>alert("Please fill all fields")</script>';
   include("register.php");
   $flag = 1;    }

if($password != $confirmpass and  $flag == 0)
{ echo '<script>alert("Your Passwords do not match")</script>';
  include("register.php");
  }

  // Connect to the SQL database
  $conn = mysqli_connect("localhost", "someuser", "somepassword", "doctor");

  // Check if the connection was successful
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Add user details to the SQL database
  $sql = "INSERT INTO users VALUES ('$name', '$address', '$mobno', '$email', '$password')";
  if (mysqli_query($conn, $sql)) {
      echo '<script>alert("Registration was successful. You may now login")</script>';
     include("login.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
?>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"
  ></script>
</body>
</html>
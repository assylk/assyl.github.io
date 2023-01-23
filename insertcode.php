<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'auth_db');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $statut = $_POST['statut'];

    $query = "INSERT INTO users (`fname`,`uname`,`email`,`phone`,`location`,`password`,`gender`,`statut`) VALUES ('$fname','$uname','$email','$phone','$location','$password','$gender','$statut')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: dashboard.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>